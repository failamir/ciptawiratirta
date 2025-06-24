<?php

namespace Modules\Job\Models;

use App\BaseModel;

class JobAlertQuery extends BaseModel
{
    protected $table = 'bc_job_alert_queries';

    protected $casts = [
        'query'=>'array'
    ];

    protected $fillable = [
        'hash'
    ];


    static function getByAttrs($attrs = []){
        $hash = md5(json_encode($attrs));
        $find = parent::firstOrNew(['hash'=>$hash]);

        if(!$find->id){
            $find->query = $attrs;
            $find->save();
        }
        return $find;
    }
}
