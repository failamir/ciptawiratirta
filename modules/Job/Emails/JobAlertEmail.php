<?php

namespace Modules\Job\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Job\Models\Job;
use Modules\Job\Models\JobAlert;

class JobAlertEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Job[]
     */
    private array $jobs;
    private JobAlert $jobAlert;

    /**
     * @param Job[] $jobs
     * @param JobAlert $jobAlert
     */
    public function __construct(array $jobs, JobAlert $jobAlert)
    {
        $this->jobs = $jobs;
        $this->jobAlert = $jobAlert;
    }

    public function build()
    {
        $subject = __('Wonderful opportunity awaits');
        return $this->subject($subject)->view('Job::emails.job-alert',[
            'jobs'=>$this->jobs,
            'user'=>$this->jobAlert->user ?? false,
            'alert'=>$this->jobAlert
        ]);
    }

}
