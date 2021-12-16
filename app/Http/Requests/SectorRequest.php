<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SectorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sector.name' => ['required', Rule::unique('sectors', 'name')->ignore(request()->route()->parameter('sector'))]
        ];
    }

    public function attributes()
    {
        return [
            'sector.name' => 'nome'
        ];
    }
}
