<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;

class UserUpdateRequest extends FormRequest
{
    public $validator = null;
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email,'.$this->id,
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo "Nome" é obrigatório.',
            'email.required' => 'O campo "Email" é obrigatório.',

            'name.max' => 'O campo "Nome" pode ter no máximo 255 caracteres.',

            'email.unique' => 'Este email já está cadastrado.',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $this->validator = $validator;
    }
}
