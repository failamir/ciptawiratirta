<?php
namespace Modules\Order\Gateways;

use Mockery\Exception;
use Modules\Booking\Events\BookingCreatedEvent;
use Modules\Order\Events\PaymentUpdated;
use Omnipay\Omnipay;
use Omnipay\Common\Exception\InvalidCreditCardException;
use Illuminate\Support\Facades\Log;

use App\Helpers\Assets;

class StripeGateway extends StripeCheckoutGateway
{
    protected $id = 'stripe';

    public $name = 'Stripe Checkout';

    protected $gateway;
}
