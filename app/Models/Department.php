<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'departments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ship_id',
        'department_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function categoryJobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }

    public function departmentSgps()
    {
        return $this->hasMany(Sgp::class, 'department_id', 'id');
    }

    public function ship()
    {
        return $this->belongsTo(Ship::class, 'ship_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
