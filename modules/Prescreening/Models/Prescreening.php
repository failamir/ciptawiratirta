<?php

namespace Modules\Prescreening\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescreening extends Model
{
    use SoftDeletes;

    protected $table = 'prescreenings';
    protected $fillable = ['candidate_id', 'test_name', 'score', 'file_result'];
    protected $dates = ['deleted_at'];

    public function candidate()
    {
        return $this->belongsTo('Modules\User\Models\Candidate');
    }
}
