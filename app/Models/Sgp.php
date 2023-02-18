<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sgp extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const INT_RESULT_RADIO = [
        'PASSED' => 'PASSED',
        'FAILED' => 'FAILED',
    ];

    public const SOURCE_SELECT = [
        'direct' => 'direct',
        'email'  => 'email',
        'wa'     => 'wa',
    ];

    public $table = 'sgps';

    protected $dates = [
        'date_of_entry',
        'int_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'remarks',
        'crew_code',
        'date_of_entry',
        'source',
        'candidate_id',
        'applied_position_id',
        'department_id',
        'gender',
        'd_o_b',
        'age',
        'vc_yf',
        'vc_covid',
        'cid',
        'coc',
        'rating_able',
        'ccm',
        'experience',
        'application_form',
        'contact_no',
        'email',
        'int_by_id',
        'int_date',
        'int_result',
        'approved_as_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Sgp::observe(new \App\Observers\SgpActionObserver());
    }

    public function getDateOfEntryAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfEntryAttribute($value)
    {
        $this->attributes['date_of_entry'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function applied_position()
    {
        return $this->belongsTo(Job::class, 'applied_position_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function int_by()
    {
        return $this->belongsTo(User::class, 'int_by_id');
    }

    public function getIntDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIntDateAttribute($value)
    {
        $this->attributes['int_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function approved_as()
    {
        return $this->belongsTo(Job::class, 'approved_as_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
