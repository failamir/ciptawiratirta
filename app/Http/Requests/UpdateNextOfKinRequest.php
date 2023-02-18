<?php

namespace App\Http\Requests;

use App\Models\NextOfKin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateNextOfKinRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('next_of_kin_edit');
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
            'place_birth' => [
                'string',
                'nullable',
            ],
            'date_of_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
