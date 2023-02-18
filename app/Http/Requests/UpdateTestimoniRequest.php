<?php

namespace App\Http\Requests;

use App\Models\Testimoni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTestimoniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testimoni_edit');
    }

    public function rules()
    {
        return [
            'judul' => [
                'string',
                'nullable',
            ],
        ];
    }
}
