<?php

namespace App\Http\Requests;

use App\Models\Testimoni;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreTestimoniRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('testimoni_create');
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
