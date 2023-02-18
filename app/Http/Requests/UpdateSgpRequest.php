<?php

namespace App\Http\Requests;

use App\Models\Sgp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSgpRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sgp_edit');
    }

    public function rules()
    {
        return [
            'remarks' => [
                'string',
                'nullable',
            ],
            'crew_code' => [
                'string',
                'nullable',
            ],
            'date_of_entry' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'gender' => [
                'string',
                'nullable',
            ],
            'd_o_b' => [
                'string',
                'nullable',
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'vc_yf' => [
                'string',
                'nullable',
            ],
            'vc_covid' => [
                'string',
                'nullable',
            ],
            'cid' => [
                'string',
                'nullable',
            ],
            'coc' => [
                'string',
                'nullable',
            ],
            'rating_able' => [
                'string',
                'nullable',
            ],
            'ccm' => [
                'string',
                'nullable',
            ],
            'experience' => [
                'string',
                'nullable',
            ],
            'application_form' => [
                'string',
                'nullable',
            ],
            'contact_no' => [
                'string',
                'nullable',
            ],
            'email' => [
                'string',
                'nullable',
            ],
            'int_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
