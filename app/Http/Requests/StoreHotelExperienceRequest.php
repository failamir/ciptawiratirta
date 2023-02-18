<?php

namespace App\Http\Requests;

use App\Models\HotelExperience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHotelExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hotel_experience_create');
    }

    public function rules()
    {
        return [
            'hotel_name' => [
                'string',
                'nullable',
            ],
            'position' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'job' => [
                'string',
                'nullable',
            ],
        ];
    }
}
