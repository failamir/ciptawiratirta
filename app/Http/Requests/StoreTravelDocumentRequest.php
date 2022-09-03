<?php

namespace App\Http\Requests;

use App\Models\TravelDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTravelDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('travel_document_create');
    }

    public function rules()
    {
        return [
            'number' => [
                'string',
                'nullable',
            ],
            'place_of_issuance' => [
                'string',
                'nullable',
            ],
            'date_of_issuance' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'date_of_expiry' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
