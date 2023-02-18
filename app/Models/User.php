<?php

namespace App\Models;

use \DateTimeInterface;
use App\Notifications\VerifyUserNotification;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable;
    use InteractsWithMedia;
    use HasFactory;

    public const CID_RADIO = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    public const CCM_RADIO = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    public const VC_YF_RADIO = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    public const RATING_ABLE_RADIO = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    public const APPLICATION_FORM_RADIO = [
        'Y' => 'Y',
        'N' => 'N',
    ];

    public const GENDER_SELECT = [
        'male'   => 'male',
        'female' => 'female',
    ];

    public const VC_COVID_RADIO = [
        'Y'   => 'Y',
        'N'   => 'N',
        '1st' => '1st',
        '2nd' => '2nd',
        '3th' => '3th',
    ];

    public const COC_SELECT = [
        'Y'         => 'Y',
        'Class I'   => 'Class I',
        'Class II'  => 'Class II',
        'Class III' => 'Class III',
        'Class IV'  => 'Class IV',
        'Class V'   => 'Class V',
        'ETO'       => 'ETO',
        'N'         => 'N',
    ];

    public $table = 'users';

    protected $appends = [
        'cv',
        'skk',
        'photo',
    ];

    protected $hidden = [
        'remember_token', 'two_factor_code',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'verified_at',
        'b_o_d',
        'created_at',
        'updated_at',
        'deleted_at',
        'two_factor_expires_at',
    ];

    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'gender',
        'email',
        'email_verified_at',
        'password',
        'verified',
        'verified_at',
        'verification_token',
        'two_factor',
        'two_factor_code',
        'remember_token',
        'ktp',
        'passport',
        'visa',
        'bst_ccm',
        'country',
        'state',
        'city',
        'address',
        'b_o_d',
        'office_registered_id',
        'created_at',
        'vc_yf',
        'vc_covid',
        'age',
        'cid',
        'coc',
        'rating_able',
        'ccm',
        'application_form',
        'contact_no',
        'nationality',
        'home_airport',
        'post_code',
        'weight',
        'height',
        'birth_place',
        'department_applied',
        'updated_at',
        'deleted_at',
        'two_factor_expires_at',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        self::created(function (User $user) {
            if (auth()->check()) {
                $user->verified = 1;
                $user->verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                $user->save();
            } elseif (!$user->verification_token) {
                $token = Str::random(64);
                $usedToken = User::where('verification_token', $token)->first();

                while ($usedToken) {
                    $token = Str::random(64);
                    $usedToken = User::where('verification_token', $token)->first();
                }

                $user->verification_token = $token;
                $user->save();

                $registrationRole = config('panel.registration_default_role');
                if (!$user->roles()->get()->contains($registrationRole)) {
                    $user->roles()->attach($registrationRole);
                }

                $user->notify(new VerifyUserNotification($user));
            }
        });
    }

    public function generateTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = rand(100000, 999999);
        $this->two_factor_expires_at = now()->addMinutes(15)->format(config('panel.date_format') . ' ' . config('panel.time_format'));
        $this->save();
    }

    public function resetTwoFactorCode()
    {
        $this->timestamps            = false;
        $this->two_factor_code       = null;
        $this->two_factor_expires_at = null;
        $this->save();
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public static function boot()
    {
        parent::boot();
        User::observe(new \App\Observers\UserActionObserver());
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function candidateSgps()
    {
        return $this->hasMany(Sgp::class, 'candidate_id', 'id');
    }

    public function intBySgps()
    {
        return $this->hasMany(Sgp::class, 'int_by_id', 'id');
    }

    public function candidateDepartures()
    {
        return $this->hasMany(Departure::class, 'candidate_id', 'id');
    }

    public function candidateInterviews()
    {
        return $this->hasMany(Interview::class, 'candidate_id', 'id');
    }

    public function userUserAlerts()
    {
        return $this->belongsToMany(UserAlert::class);
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setVerifiedAtAttribute($value)
    {
        $this->attributes['verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getCvAttribute()
    {
        return $this->getMedia('cv')->last();
    }

    public function getSkkAttribute()
    {
        return $this->getMedia('skk')->last();
    }

    public function getBODAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBODAttribute($value)
    {
        $this->attributes['b_o_d'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function office_registered()
    {
        return $this->belongsTo(Office::class, 'office_registered_id');
    }

    public function experiences()
    {
        return $this->belongsToMany(Experience::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getTwoFactorExpiresAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setTwoFactorExpiresAtAttribute($value)
    {
        $this->attributes['two_factor_expires_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
