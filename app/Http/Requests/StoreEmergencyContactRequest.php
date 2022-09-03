<?php

namespace App\Http\Requests;

use App\Models\EmergencyContact;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEmergencyContactRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('emergency_contact_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
            'relationship' => [
                'string',
                'nullable',
            ],
            'contact_number' => [
                'string',
                'nullable',
            ],
            'e_mail_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
