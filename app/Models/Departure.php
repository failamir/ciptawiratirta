<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departure extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'departures';

    protected $dates = [
        'departure_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'departure_date',
        'procedure',
        'candidate_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDepartureDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDepartureDateAttribute($value)
    {
        $this->attributes['departure_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
