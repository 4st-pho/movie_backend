<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class RegisterUserRequest extends FormRequest
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
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|string|email|max:255|unique:users',
            'username' => 'bail|required|string|min:6|max:128|unique:users',
            'password' => 'bail|required|string|min:8|max:255|confirmed',
            'phone' => 'bail|required|numeric|digits_between:10,10',   
            'birthday' => 'bail|required|date_format:Y-m-d',
            'gender' => ['bail', 'required', Rule::in(['male', 'female'])],
            'city' => 'bail|required|numeric|min:1|max:64',

        ];
    }
}
