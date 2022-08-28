<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'first_name' => [
                'string',
                'nullable',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'password' => [
                'required',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'ktp' => [
                'string',
                'nullable',
            ],
            'passport' => [
                'string',
                'nullable',
            ],
            'visa' => [
                'string',
                'nullable',
            ],
            'bst_ccm' => [
                'string',
                'nullable',
            ],
            'country' => [
                'string',
                'nullable',
            ],
            'state' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'b_o_d' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'age' => [
                'string',
                'nullable',
            ],
            'experiences.*' => [
                'integer',
            ],
            'experiences' => [
                'array',
            ],
            'contact_no' => [
                'string',
                'nullable',
            ],
        ];
    }
}
