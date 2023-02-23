<?php

namespace App\Http\Requests\Properties;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;

class VehicleRegisterRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'neighborhood' => 'required|string|max:255',
            'zipcode' => 'required|string|min:9|max:9',
            'city_id' => 'required',
            'city' => 'required|string|max:150',
            'state_id' => 'required',
            'state' => 'required|string|max:150',
            'daily_price' => 'required|min:0',
            'brand' => 'required|string|min:2|max:150',
            'year_veicle' => 'required',
            'type_veicle' => 'required|string|max:150',
            'check_in' => 'required|string|min:5|max:5',
            'check_out' => 'required|string|min:5|max:5',
            'cellphone_number' => 'required|string|min:11|max:24',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $this->validator = $validator;
    }
}
