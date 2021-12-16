<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
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
        $rules =  [
            'user.registration' => ['required', 'numeric', Rule::unique('users', 'registration')->ignore(request()->route()->parameter('user'))],
            'user.name' => ['required', 'string'],
            'user.username' => ['required', 'alpha_dash', Rule::unique('users', 'username')->ignore(request()->route()->parameter('user'))],
            'user.permission' => ['required', 'boolean']
        ];

        if($this->method() == 'POST') {
            $rules['user.password'] =['required', Password::min(8)];
        }

        if($this->method() == 'PUT') {
            $rules['user.password'] =['nullable', 'min:8'];
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'user.registration' => 'matrícula',
            'user.name' => 'nome',
            'user.username' => 'username',
            'user.password' => 'senha',
            'user.permission' => 'nível de permissão'
        ];
    }
}
