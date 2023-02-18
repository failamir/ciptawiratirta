<?php

namespace App\Http\Requests;

use App\Models\Reference;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReferenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reference_create');
    }

    public function rules()
    {
        return [
            'employers_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
