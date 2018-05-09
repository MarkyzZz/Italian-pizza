<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ContactsRequest extends FormRequest
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
            'name' => 'required|min:2|max:100',
            'email' => 'required|email',
            'message' => 'required|max:4096'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute is required!',
            'email.required' => 'We need your email for feedback!',
            'message.required' => 'The :attribute is required!'
        ];
    }
    
    /**
     * Overriding the method failedValidation for the case when
     * validator fails. Then we can do whatever we want with the validator
     * in the controller
     * @param  Illuminate\Contracts\Validation\Validator $validator
     * @return json
     */
    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }
}
