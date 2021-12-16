<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ComponentRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'component.name' => ['required', Rule::unique('components', 'name')->ignore(request()->route()->parameter('component'))]
        ];
    }

    public function attributes()
    {
        return [
            'component.name' => 'nome'
        ];
    }
}
