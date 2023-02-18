<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STATUS_SELECT = [
        'pass' => 'pass',
        'fail' => 'fail',
    ];

    public $table = 'interviews';

    protected $dates = [
        'date_interview',
        'date_expired',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date_interview',
        'date_expired',
        'link',
        'status',
        'candidate_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDateInterviewAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateInterviewAttribute($value)
    {
        $this->attributes['date_interview'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateExpiredAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDateExpiredAttribute($value)
    {
        $this->attributes['date_expired'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
