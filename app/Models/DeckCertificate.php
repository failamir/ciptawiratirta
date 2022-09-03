<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DeckCertificate extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const TYPE_CERTIFICATES_SELECT = [
        'BST'                 => 'BASIC SAFETY TRAINING (BST)',
        'AFF'                 => 'ADVANCE FIRE FIGHTING (AFF)',
        'MFA'                 => 'MEDICAL FIRST AID (MFA)',
        'PISCARB'             => 'PROFICIENCY IN SURVIVAL CRAFT AND RESCUE BOATS',
        'CMAHB'               => 'CRISIS MANAGEMENT AND HUMAN BEHAVIOUR',
        'CROWD MANAGEMENT'    => 'CROWD MANAGEMENT',
        'SAT'                 => 'SECURITY AWARENESS TRAINING',
        'SWDSD'               => 'SEAFARERS WITH DESIGNATED SECURITY DUTIES',
        'RATING ABLE'         => 'RATING ABLE',
        'RATING WATCHKEEPING' => 'RATING WATCHKEEPING',
        'ETC'                 => 'ETC.',
    ];

    public $table = 'deck_certificates';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'date_of_issue',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'candidate_id',
        'course',
        'institution',
        'place',
        'cert_number',
        'date_of_issue',
        'type_certificates',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    public function getDateOfIssueAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfIssueAttribute($value)
    {
        $this->attributes['date_of_issue'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
