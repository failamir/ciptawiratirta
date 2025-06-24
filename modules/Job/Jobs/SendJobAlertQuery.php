<?php

namespace Modules\Job\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Modules\Job\Emails\ApplyJobSubmitEmail;
use Modules\Job\Emails\JobAlertEmail;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobAlert;

class SendJobAlertQuery implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $query_id;
    protected $query_attrs;
    protected $date_posted;

    /**
     * Create a new job instance.
     */
    public function __construct($query_id,$query_attrs,$date_posted) {
        $this->query_id = $query_id;
        $this->query_attrs = $query_attrs;
        $this->date_posted = $date_posted;
    }

    /**
     * Execute the job.
     */
    public function handle(Job $job,JobAlert $alertQuery): void
    {
        $args = $this->query_attrs;

        $jobs = $job::search(array_merge($args,[
            'date_posted'=>$this->date_posted
        ]))->get();

        if(!count($jobs)) return;

        $alertQuery::query()->where('query_id',$this->query_id)->chunk(50,function($alerts) use ($jobs) {
            foreach ($alerts as $alert){
                Mail::to($alert->email)->queue(new JobAlertEmail($jobs,$alert));
            }
        });
    }
}
