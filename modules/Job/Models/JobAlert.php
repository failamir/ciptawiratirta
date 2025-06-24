<?php

namespace Modules\Job\Models;

use App\BaseModel;
use App\User;

class JobAlert extends BaseModel
{
    protected $table = 'bc_job_alerts';

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function alert_query(){
        return $this->belongsTo(JobAlertQuery::class,'query_id');
    }
}
