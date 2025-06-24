<?php


namespace Modules\Order\Listeners;


use App\Notifications\AdminChannelServices;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Emails\OrderEmail;
use Modules\Order\Events\OrderUpdated;

class OrderUpdatedNotification
{
    /**
     * Handle the event.
     *
     * @return void
     */
    public function handle(OrderUpdated $event)
    {
        $order = $event->_order;
        switch ($order->status) {
            case "completed":

                // Send Notification for admin
                $user = $order->customer;
                $data = [
                    'id' => $order->id,
                    'name' => $order->customer->getDisplayName() ?? '',
                    'avatar' => $order->customer->avatar_url ?? '',
                    'link' => route('user.admin.plan_report.index'),
                    'type' => 'order_plan',
                    'message' => __(':name ordered the new user plan', ['name' => $order->customer->getDisplayName() ?? ''])
                ];
                $user->notify(new AdminChannelServices($data));

                // Send Email
                Mail::to($order->customer)->queue(new OrderEmail($order));

                if(setting_item('admin_email')) {
                    Mail::to(setting_item('admin_email'))->queue(new OrderEmail($order, 'admin'));
                }

            break;
        }
    }
}
