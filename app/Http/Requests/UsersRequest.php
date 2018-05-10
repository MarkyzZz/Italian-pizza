<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class UsersRequest extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required|digits_between:9,11',
            'city' => 'required',
            'street' => 'required',
            'block' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
