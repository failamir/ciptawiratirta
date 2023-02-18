<?php

namespace App\Http\Requests;

use App\Models\Interview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInterviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interview_create');
    }

    public function rules()
    {
        return [
            'date_interview' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
