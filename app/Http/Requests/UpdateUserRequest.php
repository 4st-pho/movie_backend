<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateUserRequest extends FormRequest
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
            'money' => 'bail|nullable|numeric',
            'is_active' => ['bail', 'numeric', Rule::in([0, 1])],
            'password' => 'bail|nullable|string|min:8|max:255', 
            'city' => 'bail|required|numeric|min:1|max:64',
        ];
    }
}
