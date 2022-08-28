<?php

namespace App\Http\Requests;

use App\Models\Principal;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePrincipalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('principal_create');
    }

    public function rules()
    {
        return [
            'principal_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
