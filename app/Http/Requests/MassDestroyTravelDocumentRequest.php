<?php

namespace App\Http\Requests;

use App\Models\TravelDocument;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTravelDocumentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('travel_document_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:travel_documents,id',
        ];
    }
}
