<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatrimonySearchRequest extends FormRequest
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
            'filtro' => ['required_with:pesquisa', Rule::in(collect(config('patrimony.filters'))->pluck('value')->toArray())],
            'pesquisa' => ['sometimes', 'required', 'required_with:filtro']
        ];
    }
}
