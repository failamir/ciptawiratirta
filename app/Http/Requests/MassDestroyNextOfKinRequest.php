<?php

namespace App\Http\Requests;

use App\Models\NextOfKin;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNextOfKinRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('next_of_kin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:next_of_kins,id',
        ];
    }
}
