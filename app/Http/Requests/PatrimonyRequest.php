<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatrimonyRequest extends FormRequest
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
            'patrimony.number' => ['required', 'numeric', Rule::unique('patrimonies', 'number')->ignore(request()->route()->parameter('patrimony'))],
            'patrimony.component_id' => ['required'],
            'patrimony.type_id' => ['required'],
            'patrimony.ip' => ['required', 'ip', Rule::unique('patrimonies', 'ip')->ignore(request()->route()->parameter('patrimony'))],
            'patrimony.place_id' => ['required'],
            'patrimony.sector_id' => ['required'],
            'patrimony.user_id' => ['required'],
            'patrimony.note' => ['nullable']
        ];
    }

    public function attributes()
    {
        return [
            'patrimony.number' => 'patrimônio',
            'patrimony.component_id' => 'componente',
            'patrimony.type_id' => 'modelo',
            'patrimony.ip' => 'IP',
            'patrimony.place_id' => 'local',
            'patrimony.sector_id' => 'setor',
            'patrimony.user_id' => 'atendente',
            'patrimony.note' => 'observações'
        ];
    }
}
