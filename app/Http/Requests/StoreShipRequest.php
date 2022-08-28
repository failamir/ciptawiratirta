<?php

namespace App\Http\Requests;

use App\Models\Ship;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreShipRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ship_create');
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
