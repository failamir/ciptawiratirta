<?php

namespace App\Http\Requests;

use App\Models\Departure;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDepartureRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('departure_create');
    }

    public function rules()
    {
        return [
            'departure_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
