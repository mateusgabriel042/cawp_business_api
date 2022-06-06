<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;

class CustomerUpdateRequest extends FormRequest
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
            'cell_phone' => 'required|string|max:30',
            'sex' => 'required',
            'nationality' => 'required|string|max:150',
            'address_zipcode' => 'required|string|max:10',
            'address_country' => 'required|string|max:150',
            'address_state' => 'required|string|max:150',
            'address_city' => 'required|string|max:150',
            'address_neighborhood' => 'required|string|max:150',
            'address_street' => 'required|string|max:150',
            'address_number' => 'required|string|max:6',
            'user_id' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $this->validator = $validator;
    }
}
