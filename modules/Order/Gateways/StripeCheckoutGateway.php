<?php


namespace Modules\Order\Gateways;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;
use Modules\Order\Events\PaymentUpdated;
use Modules\Order\Models\Payment;

class StripeCheckoutGateway extends BaseGateway
{
    protected $id = 'stripe_checkout';

    public $name = 'Stripe Checkout V2';

    protected $gateway;

    public function getOptionsConfigs()
    {
        return [
            [
                'type'  => 'checkbox',
                'id'    => 'enable',
                'label' => __('Enable Stripe Checkout V2?')
            ],
            [
                'type'  => 'input',
                'id'    => 'name',
                'label' => __('Custom Name'),
                'std'   => __("Stripe"),
                'multi_lang' => "1"
            ],
            [
                'type'  => 'upload',
                'id'    => 'logo_id',
                'label' => __('Custom Logo'),
            ],
            [
                'type'  => 'editor',
                'id'    => 'html',
                'label' => __('Custom HTML Description'),
                'multi_lang' => "1"
            ],
            [
                'type'       => 'input',
                'id'        => 'stripe_secret_key',
                'label'     => __('Secret Key'),
            ],
            [
                'type'       => 'input',
                'id'        => 'stripe_publishable_key',
                'label'     => __('Publishable Key'),
            ],
            [
                'type'       => 'checkbox',
                'id'        => 'stripe_enable_sandbox',
                'label'     => __('Enable Sandbox Mode'),
            ],
            [
                'type'       => 'input',
                'id'        => 'stripe_test_secret_key',
                'label'     => __('Test Secret Key'),
            ],
            [
                'type'       => 'input',
                'id'        => 'stripe_test_publishable_key',
                'label'     => __('Test Publishable Key'),
            ],
            [
                'type'       => 'input',
                'id'        => 'endpoint_secret',
                'label'     => __('Webhook Secret'),
                'desc'     => __('Webhook url: <code>:url</code>',['url'=>$this->getWebhookUrl()]),
            ]
        ];
    }




    public function process(Payment $payment)
    {
        if (!$payment->amount) {
            throw new Exception(__("Booking total is zero. Can not process payment gateway!"));
        }
        $this->setupStripe();

        $stripe_customer_id =  $this->tryCreateUser($payment);
        $session_data = [
            'mode' => 'payment',
            'customer' => $stripe_customer_id,
            'success_url' => $this->getReturnUrl() . '?pid=' . $payment->id.'&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => $this->getCancelUrl() . '?pid=' . $payment->id,
            'line_items'=>[
                [
                    'price_data'=>[
                        'currency'=>setting_item('currency_main'),
                        'product_data'=>[
                            'name'=>'Order #' . $payment->object_id ?? '',
                        ],
                        'unit_amount'=>(float) $payment->amount * 100
                    ],
                    'quantity'=>1
                ]
            ]
        ];
        if(empty($session_data['line_items'][0]['price_data']['product_data']['images'][0])){
            unset($session_data['line_items'][0]['price_data']['product_data']['images']);
        }

        if(empty($session_data['customer'])){
            unset($session_data['customer']);
        }
        $session = \Stripe\Checkout\Session::create($session_data);

        $payment->status = $payment::ON_HOLD;
        $payment->save();

        try{
            PaymentUpdated::dispatch($payment);
        } catch(\Exception $e){
            Log::warning($e->getMessage());
        }
        $payment->addMeta('stripe_session_id',$session->id);
        return['url'=>$session->url ?? $payment->getDetailUrl()];
    }

    public function  tryCreateUser(Payment $payment){

        $customer = collect([]);
        $user = auth()->user();
        if($user and $user->stripe_customer_id){
            return $user->stripe_customer_id;
        }
        try {
            $billing = $payment->order->billing;
            if(empty($billing)){
                $customer = \Stripe\Customer::create([
                    'address'=>$billing['address']??"",
                    'email'=>$billing['email']??"",
                    'phone'=>$billing['phone']??"",
                    'name'=>$billing['first_name']??"".' '.$billing['last_name']??"",
                ]);
            }
        }catch (\Exception $e){
            Log::warning($e->getMessage());
        }

        if(!empty($customer->id)){
            if($user) {
                $user->stripe_customer_id = $customer->id;
                $user->save();
            }
            return $customer->id;
        }
        return null;


    }

    public function cancelPayment(Request $request)
    {
        $pid = $request->query('pid');
        $payment = Payment::find($pid);
        if (!empty($payment) and in_array($payment->status, [Payment::ON_HOLD])) {
            $payment->status = 'cancel';
            $payment->logs = \GuzzleHttp\json_encode([
                'customer_cancel' => 1,
                'log'=>$request->all()
            ]);
            $payment->save();
            return redirect($payment->getDetailUrl())->with("error", __("You cancelled the payment"));
        } else {
            return redirect(url('/'));
        }
    }

    public function setupStripe(){
        \Stripe\Stripe::setApiKey($this->getSecretKey());
    }

    public function getPublicKey(){
        if($this->getOption('stripe_enable_sandbox'))
        {
            return $this->getOption('stripe_test_publishable_key');
        }
        return $this->getOption('stripe_public_key');
    }

    public function getSecretKey(){
        if($this->getOption('stripe_enable_sandbox'))
        {
            return $this->getOption('stripe_test_secret_key');
        }
        return $this->getOption('stripe_secret_key');
    }

    public function confirmPayment(Request $request)
    {
        $pid = $request->query('pid');
        $payment = Payment::find($pid);
        $this->setupStripe();
        $session_id = $request->query('session_id');

        $session = \Stripe\Checkout\Session::retrieve($session_id);
        if(empty($session)){
            return redirect($payment->getDetailUrl());
        }

        if (!empty($payment) and in_array($payment->status, [Payment::ON_HOLD])) {

            if($session->payment_status == 'paid'){
                $payment->status = Payment::COMPLETED;
            }
            if($session->payment_status == 'no_payment_required'){
                $payment->status = Payment::COMPLETED;
            }

            $payment->logs = \GuzzleHttp\json_encode($session);
            $payment->save();

            $payment->addMeta('stripe_intent_id',$session->payment_intent);
            PaymentUpdated::dispatch($payment);

            return redirect($payment->getDetailUrl());

        }
        if (!empty($payment)) {
            return redirect($payment->getDetailUrl());
        } else {
            return redirect(url('/'));
        }
    }

    public function callbackPayment(Request $request){
        return $this->callback($request);
    }
    public function callback(Request $request)
    {
        $this->setupStripe();
        $endpoint_secret = $this->getOption('endpoint_secret');
        $payload = @file_get_contents('php://input');
        $event = NULL;

        if ($endpoint_secret and !empty($sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'])) {
            try {
                $event = \Stripe\Webhook::constructEvent(
                    $payload, $sig_header, $endpoint_secret
                );
            } catch (\Stripe\Exception\SignatureVerificationException $e) {
                return response()->json(['message' => __('Webhook error while validating signature.')], 400);
            }
        }

        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object; // contains a \Stripe\PaymentIntent
                $payment = Payment::whereHas('meta', function ($query) use($paymentIntent){
                    $query->where('stripe_intent_id',$paymentIntent->id);
                })->first();
                if (!$payment) {
                    return response()->json(['message' => __('Payment not found')], 400);
                }

                if (!empty($paymentIntent->charges->data)) {
                    $chargeArr= [];
                    foreach ($paymentIntent->charges->data as $charge) {
                        if ($charge['paid'] == true) {
                            $chargeArr[]=  $charge['id'];
                        }
                    }
                    if(!empty($chargeArr)){
                        $payment->addMeta('stripe_charge_id',$chargeArr);
                    }
                }
                $payment->status = Payment::COMPLETED;
                $payment->logs = \GuzzleHttp\json_encode($paymentIntent);
                $payment->save();
                PaymentUpdated::dispatch($payment);
                break;
            default:
                return response()->json(['message' => __('Received unknown event type')], 400);
        }
    }

    public function processNormal($payment)
    {
        $this->setupStripe();
        $session = \Stripe\Checkout\Session::create([
            'mode'        => 'payment',
            'success_url' => $this->getReturnUrl(true).'?pid='.$payment->code.'&session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => $this->getCancelUrl(true).'?pid='.$payment->code,
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'    => setting_item('currency_main'),
                        'unit_amount' => (float) $payment->amount * 100,
                        'product_data'=>[
                            'name'=>__("Buy credits"),
                        ],
                    ],

                    'quantity'   => 1
                ],
            ]
        ]);
        $payment->addMeta('stripe_session_id',$session->id);
        if (!empty($session->url)) {
            return [true, false, $session->url];
        }
        return [true];
    }
    public function confirmNormalPayment()
    {
        /**
         * @var Payment $payment
         */
        $request = \request();
        $pid = $request->query('pid');
        $payment = Payment::find($pid);


        if (!empty($payment) and in_array($payment->status, ['draft'])) {
            $this->setupStripe();
            $session_id = $request->query('session_id');
            if (empty($session_id)) {
                return [false];
            }
            $session = \Stripe\Checkout\Session::retrieve($session_id);
            if (empty($session)) {
                return [false];
            }
            $payment->log = json_encode($session);
            if ($session->payment_status == 'paid') {
                $payment->status = Payment::COMPLETED;
                $payment->save();
                dispatch(new PaymentUpdated($payment));
                return [true];
            } else {
                $payment->status = Payment::FAIL;
                $payment->save();
                dispatch(new PaymentUpdated($payment));
                return [false];
            }
        }
        if ($payment) {
            if ($payment->status == 'cancel') {
                return [false, __("Your payment has been canceled")];
            }
        }
        return [false];
    }



}
