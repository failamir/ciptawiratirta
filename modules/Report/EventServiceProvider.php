<?php
namespace Modules\Report;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Report\Events\CustomerReportSubmit;
use Modules\Report\Listeners\SendNotifyReportSubmitListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        CustomerReportSubmit::class => [
            SendNotifyReportSubmitListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
