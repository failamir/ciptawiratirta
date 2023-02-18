<?php

namespace App\Http\Requests;

use App\Models\Experience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('experience_edit');
    }

    public function rules()
    {
        return [
            'company_name' => [
                'string',
                'nullable',
            ],
            'value' => [
                'string',
                'nullable',
            ],
            'last_position' => [
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
            'reason_leave' => [
                'string',
                'nullable',
            ],
        ];
    }
}
