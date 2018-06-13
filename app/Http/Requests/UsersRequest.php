<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

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
            'email' => Auth::check()? '' : 'required|email',
            'name' => Auth::check()? '' : 'required',
            'phone' => Auth::check()? '' : 'required|digits_between:9,11',
            'city' => Auth::check()? '' : 'required',
            'street' => Auth::check()? '' : 'required',
            'block' => Auth::check()? '' : 'required',
            'payment_type' => Auth::check()? '' : 'required',
            'card_no' => $this->requiredIfEpayment()? 'required|digits:16' : '',
            'ccExpiryMonth' => $this->requiredIfEpayment()? 'required|digits:2|between:01,12' : '',
            'ccExpiryYear' => $this->requiredIfEpayment()? 'required|digits:2' : '',
            'cardCVV' => $this->requiredIfEpayment()? 'required|digits:3' : '',
            'card_owner' => $this->requiredIfEpayment()? ['required','regex:/(^[\w]*[\s]{1}[\w]{1,}$)/'] : ''
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->validator = $validator;
    }

    private function requiredIfEpayment()
    {
        return Input::has('payment_type') && Input::get('payment_type') == 'epayment';
    }
}
