<?php

namespace Modules\Order\Gateways;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mockery\Exception;
use Modules\Order\Events\PaymentUpdated;
use Modules\Order\Models\Payment;

class PayrexxGateway extends BaseGateway
{
    public $id = 'payrexx';
    public $name = 'Payrexx Checkout';
    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type' => 'checkbox',
                'id' => 'enable',
                'label' => __('Enable Payrexx Checkout?'),

            ],
            [
                'type' => 'input',
                'id' => 'name',
                'label' => __('Custom Name'),
                'std' => __("Payrexx Checkout"),
                'multi_lang' => "1"
            ],
            [
                'type' => 'upload',
                'id' => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type' => 'editor',
                'id' => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
            [
                'type' => 'input',
                'id' => 'instance_name',
                'label' => __('Instance name'),
            ],
            [
                'type' => 'input',
                'id' => 'api_secret_key',
                'label' => __('Api secret key'),
                'desc' => __('Url callback: ') . "<b>" . route('gateway.webhook', ['gateway' => $this->id]) . "</b>",
            ]
        ];
    }

    public function process(\Modules\Order\Models\Payment $payment)
    {
        if (!$payment->amount) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }
        return $this->payment($payment);
    }

    public function payment(\Modules\Order\Models\Payment $payment)
    {

        $instanceName = $this->getOption('instance_name');
        $secret = $this->getOption('api_secret_key');
        $payrexx = new \Payrexx\Payrexx($instanceName, $secret);

        $gateway = new \Payrexx\Models\Request\Gateway();

// amount multiplied by 100
        $gateway->setAmount($payment->amount * 100);

// currency ISO code
        $gateway->setCurrency(Str::upper(setting_item('currency_main')));

// VAT rate percentage (nullable)
        $gateway->setVatRate(null);

//Product SKU
        $gateway->setSku($payment->id);


//success and failed url in case that merchant redirects to payment site instead of using the modal view
        $gateway->setSuccessRedirectUrl($this->getReturnUrl() . '?c=' . $payment->id);
        $gateway->setFailedRedirectUrl($this->getCancelUrl() . '?c=' . $payment->id);

        // optional: payment service provider(s) to use (see http://developers.payrexx.com/docs/miscellaneous)
        // empty array = all available psps
        $gateway->setPsp(array());
//            $gateway->setPm(array('visa'));

        // optional: if you want to do a pre authorization which should be charged on first time
//        $gateway->setChargeOnAuthorization(false);
        $gateway->setPreAuthorization(false);


        $gateway->setReservation(false);


        // subscription information if you want the customer to authorize a recurring payment.
        // this does not work in combination with pre-authorization payments.
        //$gateway->setSubscriptionState(true);
        //$gateway->setSubscriptionInterval('P1M');
        //$gateway->setSubscriptionPeriod('P1Y');
        //$gateway->setSubscriptionCancellationInterval('P3M');

        $desc = [];
        $desc[] = [
            'name' => ['Order #' . $payment->object_id],
            'quantity' => 1,
            'amount' => $payment->amount * 100
        ];

        $gateway->setBasket($desc);

        // optional: reference id of merchant (e. g. order number)
        $gateway->setReferenceId($payment->id);

        $billing = $payment->order->billing;

        // optional: add contact information which should be stored along with payment
        $gateway->addField($type = 'title', $value = setting_item('site_title'));
        $gateway->addField($type = 'forename', $value = $billing['last_name'] ?? "");
        $gateway->addField($type = 'surname', $value = $billing['first_name'] ?? "");
        $gateway->addField($type = 'street', $value = $billing['address'] ?? "");
        $gateway->addField($type = 'postcode', $value = $billing['zip_code'] ?? "");
        $gateway->addField($type = 'country', $value = $billing['country'] ?? "");
        $gateway->addField($type = 'phone', $value = $billing['phone'] ?? "");
        $gateway->addField($type = 'email', $value = $billing['email'] ?? "");
        $gateway->addField($type = 'description', $value = $billing['email'] ?? "");
//        $gateway->setButtonText(
//            ['Fortfahren','Fortfahren','Continue']
//        );
//        $gateway->addField($type = 'terms', $value='asdasdasd');
//        $gateway->addField($type = 'privacy_policy', $value='23123123123');
        try {
            $response = $payrexx->create($gateway);
            if (!empty($response->getLink())) {
                $payment->addMeta('payrexxId', $response->getId());
                return ['url'=>$response->getLink()];
            }
        } catch (\Payrexx\PayrexxException $e) {
            throw new \Exception($e->getMessage());
        }
    }


    public function getDisplayHtml()
    {
        $location = app()->getLocale();
        if (setting_item('site_locale') == $location) {
            return $this->getOption('html', '');
        } else {
            return $this->getOption('html_' . $location);
        }
    }

    public function confirmPayment(Request $request)
    {
        $c = $request->query('c');
        $payment = Payment::find($c);
        if (!empty($payment) and $payment->status !== Payment::COMPLETED) {
            $checkPayment = $this->checkPayment($payment);
            $status = $checkPayment->getStatus();
            if ($status != 'confirmed') {
                try {
                    $data = $checkPayment->toArray($checkPayment);
                    if ($status == 'waiting') {
                        $payment->status = Payment::ON_HOLD;
                        $payment->logs = \GuzzleHttp\json_encode($data);
                        $payment->save();
                        return redirect($payment->getDetailUrl())->with("error", __("Your payment has been placed"));
                    } else {
                        $data = $checkPayment->toArray($checkPayment);
                        $payment->status = Payment::FAIL;
                        $payment->logs = \GuzzleHttp\json_encode($data);
                        $payment->save();
                    }
                } catch (\Swift_TransportException $e) {
                    Log::warning($e->getMessage());
                }
                return redirect($payment->getDetailUrl())->with("error", __("Payment Failed"));
            } else {
                try {
                    $payment->status = Payment::COMPLETED;
                    $payment->logs = \GuzzleHttp\json_encode($checkPayment->toArray($checkPayment));
                    $payment->save();
                    PaymentUpdated::dispatch($payment);
                    return redirect($payment->getDetailUrl())->with("success", __("You payment has been processed successfully"));
                } catch (\Swift_TransportException $e) {
                    return redirect($payment->getDetailUrl())->with("error", $e->getMessage());
                }
            }
        }
        if (!empty($payment)) {
            return redirect($payment->getDetailUrl(false));
        } else {
            return redirect(url('/'));
        }
    }

    public function callbackPayment(Request $request)
    {
        $transaction = $request->transaction;
        if (!empty($transaction['referenceId'])) {
            $payment = Payment::find($transaction['referenceId']);
            if (!empty($payment) and $payment->status !== Payment::COMPLETED) {
                $checkPayment = $this->checkPayment($payment, $transaction);
                $status = $checkPayment->getStatus();
                if ($status != 'confirmed') {
                    try {
                        $data = $checkPayment->toArray($checkPayment);
                        switch ($status) {
                            case 'waiting':
                            case 'authorized':
                                $payment->status = Payment::ON_HOLD;
                                $payment->logs = \GuzzleHttp\json_encode($data);
                                $payment->save();
                                return response()->json(['status' => 'error', "message" => __("Payment Processing")]);
                                break;
                            default:
                                $payment->status = Payment::FAIL;
                                $payment->logs = \GuzzleHttp\json_encode($data);
                                $payment->save();
                                return response()->json(['status' => 'error', "message" => __("Payment Failed.")]);
                        }

                    } catch (\Swift_TransportException $e) {
                        return response()->json(['status' => 'error', "message" => __("Payment Failed")]);
                    }
                } else {
                    try {
                        $payment->status = Payment::COMPLETED;
                        $payment->logs = \GuzzleHttp\json_encode($checkPayment->toArray($checkPayment));
                        $payment->save();
                        PaymentUpdated::dispatch($payment);
                    } catch (\Swift_TransportException $e) {
                        return response()->json(['status' => 'error', "message" => $e->getMessage()]);
                    }

                    return response()->json(['status' => 'success', "message" => __("You payment has been processed successfully before")]);
                }
            }
            if (!empty($payment)) {
                return response()->json(['status' => 'success', "message" => __("No information found")]);
            } else {
                return response()->json(['status' => 'error', "message" => __("No information found")]);
            }
        } else {
            return response()->json(['status' => 'error', "message" => __("referenceId can't null")]);
        }

    }


    public function cancelPayment(Request $request)
    {
        $c = $request->query('c');
        $payment = Payment::find($c);
        if ($payment->status!=='completed') {
            $payment = $payment->payment;
            if ($payment) {
                $payment->status = 'cancel';
                $payment->logs = \GuzzleHttp\json_encode([
                    'customer_cancel' => 1,
                    'log'=>$request->all()
                ]);
                $payment->save();
            }
            return redirect($payment->getDetailUrl())->with("error", __("You cancelled the payment"));
        }else {
            return redirect(url('/'));
        }
    }

    public function checkPayment($payment, $transaction = false)
    {
        $payrexxId = $payment->getMeta('payrexxId');
        $instanceName = $this->getOption('instance_name');
        $secret = $this->getOption('api_secret_key');
        $payrexx = new \Payrexx\Payrexx($instanceName, $secret);
        $gateway = new \Payrexx\Models\Request\Gateway();


        if (!empty($transaction['id'])) {
            //For webhooks
            $transition = new \Payrexx\Models\Request\Transaction();
            $transition->setId($transaction['id']);
            try {
                $response = $payrexx->getOne($transition);

                if (!empty($response->getStatus())) {
                    return $response;
                }
            } catch (\Payrexx\PayrexxException $e) {
                print $e->getMessage();
            }

        } else {
            // Khong the capture dc gateway o day,
            $gateway->setId($payrexxId);
            try {
                $response = $payrexx->getOne($gateway);

                if (!empty($response->getStatus())) {
                    return $response;
                }
            } catch (\Payrexx\PayrexxException $e) {
                print $e->getMessage();
            }
        }

    }

    public function getDisplayLogo()
    {
        $logo_id = $this->getOption('logo_id');
        return get_file_url($logo_id, 'medium');
    }

}
