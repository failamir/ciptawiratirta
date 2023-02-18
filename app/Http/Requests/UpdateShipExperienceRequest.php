<?php

namespace App\Http\Requests;

use App\Models\ShipExperience;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateShipExperienceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ship_experience_edit');
    }

    public function rules()
    {
        return [
            'vessel_name' => [
                'string',
                'nullable',
            ],
            'gt_loa' => [
                'string',
                'nullable',
            ],
            'vessel_route' => [
                'string',
                'nullable',
            ],
            'position' => [
                'string',
                'nullable',
            ],
            'start_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'end_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'job' => [
                'string',
                'nullable',
            ],
        ];
    }
}
