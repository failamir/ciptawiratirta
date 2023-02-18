<?php

namespace App\Http\Requests;

use App\Models\HotelCertificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateHotelCertificateRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hotel_certificate_edit');
    }

    public function rules()
    {
        return [
            'course' => [
                'string',
                'nullable',
            ],
            'institution' => [
                'string',
                'nullable',
            ],
            'place' => [
                'string',
                'nullable',
            ],
            'cert_number' => [
                'string',
                'nullable',
            ],
            'date_of_issue' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
