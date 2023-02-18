<?php

namespace App\Http\Requests;

use App\Models\FormalEducation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreFormalEducationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('formal_education_create');
    }

    public function rules()
    {
        return [
            'school_academy' => [
                'string',
                'nullable',
            ],
            'from_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'to_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'qualification_attained' => [
                'string',
                'nullable',
            ],
        ];
    }
}
