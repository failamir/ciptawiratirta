<?php

namespace Modules\Job\Commands;

use Illuminate\Console\Command;
use Modules\Job\Jobs\SendJobAlertQuery;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobAlert;
use Modules\Job\Models\JobAlertQuery;
use function Clue\StreamFilter\fun;

class SendJobAlertEmail  extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'job:send-alert {frequency}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send all job alert emails';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Job $job)
    {
        $frequency = $this->argument('frequency') ?:'daily';

        switch ($frequency){
            case "weekly":
                $date_posted = 'last_7';
            break;
            case "monthly":
                $date_posted = 'last_30';
                break;
            default:
                $date_posted = 'last_1';
                break;
        }

        $queries = JobAlertQuery::query()
                            ->select(['bc_job_alert_queries.id','bc_job_alert_queries.query'])
                            ->join('bc_job_alerts','bc_job_alerts.query_id','bc_job_alert_queries.id')
                            ->where('bc_job_alerts.frequency',$frequency)
                            ->groupBy('bc_job_alert_queries.id');

        $queries->chunk(15,function($items) use ($date_posted){
            if(count($items)){
                foreach ($items as $queryItem){
                    SendJobAlertQuery::dispatch($queryItem->id,$queryItem->query,$date_posted);
                }
            }
        });
    }
}
