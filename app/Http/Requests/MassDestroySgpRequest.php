<?php

namespace App\Http\Requests;

use App\Models\Sgp;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySgpRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('sgp_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:sgps,id',
        ];
    }
}
