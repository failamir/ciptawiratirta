<?php

namespace Modules\Order\Gateways;

use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Log;
use Modules\Order\Events\PaymentUpdated;
use Modules\Order\Models\Payment;
use Unicodeveloper\Paystack\Paystack;

class PaystackGateway extends BaseGateway
{
    public $name = 'Paystack Checkout';
    /**
     * @var $gateway Paystack
     */
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Paystack gateway?')
            ],
            [
                'type'       => 'input',
                'id'         => 'name',
                'label'      => __('Custom Name'),
                'std'        => __("Paystack"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'       => 'editor',
                'id'         => 'html',
                'label'      => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'input',
                'id'    => 'public_key',
                'label' => __('Public key')
            ],
            [
                'type'  => 'input',
                'id'    => 'secret_key',
                'label' => __('Secret key')
            ],
            [
                'type'  => 'input',
                'id'    => 'payment_url',
                'label' => __('Payment Url'),
                'std'   => "https://api.paystack.co"
            ],
            [
                'type'  => 'input',
                'id'    => 'merchant_email',
                'label' => __('Merchant Email'),
                'desc'  => "Url Callback: <b>" . route('gateway.confirm', ['gateway' => $this->id]) . "</b> <br>Url Webhook: <b>" . route('gateway.webhook', ['gateway' => $this->id]) . "</b> <br>",

            ],

        ];
    }

    public function process(Payment $payment)
    {

        if (!$payment->amount) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }

        $this->getGateway();

        $data = $this->handlePurchaseData([],$payment);
        $response = $this->gateway->getAuthorizationResponse($data);

        if (!empty($response['status'] and !empty($response['data']['authorization_url']))) {
            $payment->status = Payment::ON_HOLD;
            $payment->save();
            try {
                PaymentUpdated::dispatch($payment);
            } catch (\Exception $e) {
                Log::warning($e->getMessage());
                throw new Exception('Paystack Gateway: ' . $e->getMessage());
            }
            return['url'=>$response['data']['authorization_url'] ?? $payment->getDetailUrl()];
        }
        else {
            throw new Exception('Paystack Gateway: ' . $response->getMessage());
        }
    }

    public function confirmPayment(Request $request)
    {
        $this->getGateway();
        $response = $this->gateway->getPaymentData();
        if ($response['status']) {
            $metadata = $response['data']['metadata'];
            if (!empty($metadata['normal_checkout']) and $metadata['normal_checkout']=='1') {
//                redirect to confirm normal
                return redirect(url($metadata['returnUrl'], $request->all()));
            }
            else {
                $payment = Payment::find($metadata['pid']);
                if (!empty($payment) and in_array($payment->status, [Payment::ON_HOLD])) {

                    if (!empty($response['status']) and $response['data']['status'] == 'success') {
                        if ($payment) {
                            $payment->status = Payment::COMPLETED;
                            $payment->logs = \GuzzleHttp\json_encode($response);
                            $payment->save();
                            PaymentUpdated::dispatch($payment);

                        }
                        return redirect($payment->getDetailUrl())->with("success", __("You payment has been processed successfully"));
                    }
                    else {
                        if ($payment) {
                            $payment->status = Payment::FAIL;
                            $payment->logs = \GuzzleHttp\json_encode($response);
                            $payment->save();
                            PaymentUpdated::dispatch($payment);

                        }
                        return redirect($payment->getDetailUrl())->with("error", __("Payment Failed"));
                    }
                }
                if (!empty($payment)) {
                    return redirect($payment->getDetailUrl());
                }
            }
        }
        return redirect(url('/'));


    }

    /**
     * @var Payment $payment
     */
    public function confirmNormalPayment()
    {
        $this->getGateway();
        $response = $this->gateway->getPaymentData();
        if ($response['status']) {
            $metadata = $response['data']['metadata'];
            if ($metadata['pid']) {
                $payment = Payment::find($metadata['pid']);
                if (!empty($payment) and in_array($payment->status, [Payment::ON_HOLD])) {
                    if ($response['status'] == 'success') {
                        $payment->status = Payment::COMPLETED;
                        $payment->save();
                        PaymentUpdated::dispatch($payment);
                        return [true];
                    }
                    else {
                        $payment->status = Payment::FAIL;
                        $payment->save();
                        PaymentUpdated::dispatch($payment);
                        return [true];
                    }
                }
                else {
                    if ($payment->status == 'cancel') {
                        return [false, __("Your payment has been canceled")];
                    }
                }
            }
        }
        return [false];
    }


    public function processNormal($payment)
    {
        $this->getGateway();
        $payment->payment_gateway = $this->id;
        $data = $this->handlePurchaseDataNormal([], $payment);
        $response = $this->gateway->getAuthorizationResponse($data);
        if (!empty($response['status'] and !empty($response['data']['authorization_url']))) {
            return [true, false, $response['data']['authorization_url']];
        }
        else {
            return [false, $response->getMessage()];
        }
    }

    public function cancelPayment(Request $request)
    {
        $pid = $request->query('pid');
        $payment = Payment::find($pid);
        if (!empty($payment) and in_array($payment->status, [Payment::ON_HOLD])) {
            if ($payment) {
                $payment->status = 'cancel';
                $payment->logs = \GuzzleHttp\json_encode([
                    'customer_cancel' => 1,
                    'log'=>$request->all()
                ]);
                $payment->save();
            }
            return redirect($payment->getDetailUrl())->with("error", __("You cancelled the payment"));
        }
        else {
            return redirect(url('/'));
        }
    }


    public function callbackPayment(Request $request)
    {
        try {
            $this->getGateway();
            $response = $this->gateway->getPaymentData();
            if (!empty($response['data']) and !empty($response['data']['metadata'])) {
                $metadata = $response['data']['metadata'];
                $payment = Payment::find($metadata['pid']);

                if (!empty($metadata['normal_checkout']) and $metadata['normal_checkout']=='1') {
                    if (!empty($payment) and !in_array($payment->status, [
                            Payment::COMPLETED,
                            'cancel'
                        ])) {
                        if (in_array($response['event'], ['charge.success', 'paymentrequest.success'])) {
                            try {
                                $payment->status = Payment::COMPLETED;
                                $payment->logs = \GuzzleHttp\json_encode($response);
                                $payment->save();
                                PaymentUpdated::dispatch($payment);
                            } catch (\Exception $e) {
                                return response()->json(['status' => 'error', "message" => $e->getMessage()]);
                            }
                            return response()->json(['status' => 'success', "message" => __("You payment has been processed successfully")]);
                        }
                    }
                    if (!empty($payment)) {
                        return response()->json(['status' => 'success', "message" => __("not update status " . $response['event'])]);
                    }
                    else {
                        return response()->json(['status' => 'error', "message" => __("No information found")]);
                    }
                }
                else {
                    if (!empty($payment) and !in_array($payment->status, [
                            Payment::COMPLETED,
                            'cancel'
                        ])) {
                        if (in_array($response['event'], ['charge.success', 'paymentrequest.success'])) {
                            try {
                                $payment->status = Payment::COMPLETED;
                                $payment->logs = \GuzzleHttp\json_encode($response);
                                $payment->save();
                                PaymentUpdated::dispatch($payment);
                                return response()->json(['status' => 'success', "message" => __("You payment has been processed successfully")]);
                            } catch (\Exception $e) {
                                return response()->json(['status' => 'error', "message" => $e->getMessage()]);
                            }
                        }
                        else {
                            return response()->json(['status' => 'success', "message" => __("You payment has been processed successfully before")]);
                        }
                    }

                }

            }


        } catch (\Exception $exception) {

        }

    }

    public function getGateway()
    {
        config()->set('paystack.publicKey', $this->getOption('public_key'));
        config()->set('paystack.secretKey', $this->getOption('secret_key'));
        config()->set('paystack.paymentUrl', $this->getOption('payment_url'));
        config()->set('paystack.merchantEmail', $this->getOption('merchant_email'));
        $this->gateway = (new Paystack());
    }

    public function handlePurchaseDataNormal($data, &$payment = null)
    {
        $billing = $payment->order->billing;

        $main_currency = setting_item('currency_main');
        $data['amount'] = (float)$payment->amount * 100;
        $data['orderID'] = $payment->id;
        $data['reference'] = $payment->id . time();
        $data['email'] = $billing['email'];
        $data['currency'] = \Str::upper($main_currency);
        $data['metadata'] = [
            'pid'            => $payment->id,
            "cancel_action"   => $this->getCancelUrl(true) . '?pid=' . $payment->code,
            'normal_checkout' => 1,
            'returnUrl'       => $this->getReturnUrl(true) . '?pid=' . $payment->code,
            'cancelUrl'       => $this->getCancelUrl(true) . '?pid=' . $payment->code,

        ];
        return $data;
    }

    public function handlePurchaseData($data, $booking, &$payment = null)
    {
        $main_currency = setting_item('currency_main');
        $data['amount'] = (float)$booking->pay_now * 100;
        $data['orderID'] = $booking->id;
        $data['reference'] = $booking->code . time();
        $data['email'] = $booking->email;
        $data['currency'] = \Str::upper($main_currency);
        $data['returnUrl'] = $this->getReturnUrl() . '?c=' . $booking->code;
        $data['metadata'] = [
            'code'            => $booking->code,
            "cancel_action"   => $this->getCancelUrl() . '?c=' . $booking->code,
            'returnUrl'       => $this->getReturnUrl() . '?c=' . $booking->code,
            'cancelUrl'       => $this->getCancelUrl() . '?c=' . $booking->code,
            'normal_checkout' => 0
        ];
        return $data;
    }
}
