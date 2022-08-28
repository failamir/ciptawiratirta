<?php

namespace App\Http\Requests;

use App\Models\Ship;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ship_edit');
    }

    public function rules()
    {
        return [
            'ship_name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
