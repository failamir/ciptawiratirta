<?php

namespace App\Http\Requests;

use App\Models\ShipExperience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyShipExperienceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ship_experience_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ship_experiences,id',
        ];
    }
}
