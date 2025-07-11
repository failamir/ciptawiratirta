<?php

namespace App\Console;

use App\Console\Commands\AutoCompleteGigOrder;
use App\Console\Commands\ScanExpiredUserPlan;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Payout\Commands\CreatePayoutsCommand;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(ScanExpiredUserPlan::class)->everyTwoHours()->withoutOverlapping();
        $schedule->command(AutoCompleteGigOrder::class)->hourly()->withoutOverlapping();
        $schedule->command(CreatePayoutsCommand::class)->monthlyOn(15);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
