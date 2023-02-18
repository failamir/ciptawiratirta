<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ship extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'ships';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ship_name',
        'principal_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function shipDepartments()
    {
        return $this->hasMany(Department::class, 'ship_id', 'id');
    }

    public function jobTypeJobs()
    {
        return $this->hasMany(Job::class, 'job_type_id', 'id');
    }

    public function principal()
    {
        return $this->belongsTo(Principal::class, 'principal_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
