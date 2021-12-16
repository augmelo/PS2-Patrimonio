<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeRequest extends FormRequest
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
        $uniqueRule = Rule::unique('types', 'name')
        ->where(function($query){
            return $query->where('component_id', $this->type['component_id']);
        })
        ->ignore(request()->route()->parameter('type'));
        
        return [
            'type.name' => ['required', $uniqueRule],
            'type.component_id' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'type.name' => 'nome',
            'type.component_id' => 'componente'
        ];
    }
}
