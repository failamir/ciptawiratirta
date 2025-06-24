<?php

namespace Modules\Report\Models;

use App\BaseModel;
use Modules\Gig\Models\Gig;
use Modules\Job\Models\Job;

class CustomerReport extends BaseModel{

    protected $table = 'bc_customer_reports';

    protected $fillable = [
        'service_id',
        'service_type',
        'name',
        'email',
        'description'
    ];

    public function job(){
        return $this->hasOne(Job::class, 'id', 'service_id');
    }

    public function gig(){
        return $this->hasOne(Gig::class, 'id', 'service_id');
    }
}
