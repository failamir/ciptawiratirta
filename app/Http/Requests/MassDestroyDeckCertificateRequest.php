<?php

namespace App\Http\Requests;

use App\Models\DeckCertificate;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDeckCertificateRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('deck_certificate_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:deck_certificates,id',
        ];
    }
}
