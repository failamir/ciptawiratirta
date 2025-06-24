<?php


namespace Modules\Report;

use Modules\User\Models\Wallet\DepositPayment;

class ModuleProvider extends \Modules\ModuleServiceProvider
{
    public function register()
    {

        $this->app->register(RouteServiceProvider::class);
        $this->app->register(EventServiceProvider::class);
    }

    public static function getAdminMenu()
    {
        return [
            'report'=>[
                "position" => 200,
                'url'        => 'admin/module/contact',
                'title'      => __('Report'),
                'icon'       => 'icon ion ion-md-stats',
                'permission' => 'contact_manage',
                'children' => [
                    'contact'=>[
                        'url'        => 'admin/module/contact',
                        'title'      => __("Contact Submissions"),
                        'permission' => 'job_manage',
                    ],
                    'customer_report'=>[
                        'url'        => route('report.admin.customerReport'),
                        'title'      => __("Customer Reports"),
                        'permission' => 'setting_manage'
                    ],
                ]
            ],
        ];
    }
}
