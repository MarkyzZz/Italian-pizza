<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RegistrationRequest extends FormRequest
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
            'email' =>    'required|email',
            'password' => strpos(Request::path(), 'edit')?  (empty(Request::get('password'))? '' : 'min:6|confirmed') : 'required|min:6|confirmed',
            'full_name' => 'required',
            'phone' => 'digits_between:9,11',
            'city' => 'required',
            'street' => 'required',
            'block_no' => 'required',
        ];
    }
}
