<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmergencyContact extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'emergency_contacts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'relationship',
        'candidate_id',
        'contact_number',
        'e_mail_address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
