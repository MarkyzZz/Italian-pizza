<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'img' => Request::hasFile('img')? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' : 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'description' => 'required|max:4096',
            'price' => ['required', 'regex:/^[0-9]*(.[0-9]{2})?$/']
        ];
    }
}
