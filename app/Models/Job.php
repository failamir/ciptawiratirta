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

class Job extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const IS_URGENT_SELECT = [
        'yes' => 'yes',
        'no'  => 'no',
    ];

    public const GENDER_SELECT = [
        'male'   => 'male',
        'female' => 'female',
    ];

    public const STATUS_SELECT = [
        'publish' => 'publish',
        'draft'   => 'draft',
    ];

    public $table = 'jobs';

    protected $appends = [
        'video_cover',
    ];

    protected $dates = [
        'expiration_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'category_id',
        'thumbnail',
        'company_id',
        'job_type_id',
        'expiration_date',
        'gender',
        'is_urgent',
        'status',
        'video',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function appliedPositionSgps()
    {
        return $this->hasMany(Sgp::class, 'applied_position_id', 'id');
    }

    public function approvedAsSgps()
    {
        return $this->hasMany(Sgp::class, 'approved_as_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Department::class, 'category_id');
    }

    public function company()
    {
        return $this->belongsTo(Principal::class, 'company_id');
    }

    public function job_type()
    {
        return $this->belongsTo(Ship::class, 'job_type_id');
    }

    public function getExpirationDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setExpirationDateAttribute($value)
    {
        $this->attributes['expiration_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVideoCoverAttribute()
    {
        $file = $this->getMedia('video_cover')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
