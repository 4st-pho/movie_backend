<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
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
            'name' => 'min:3|max:255',
            'image_url' => 'mimes:jpeg,png,jpg',
        ];
    }
    public function messages()
    {
        return [
            'name.min' => "Số ký tự tối thiểu là 3 ký tự.",
            'name.max' => "Số ký tự tối đa là 255 ký tự.",
            'image_url.mimes' => "Hình ảnh phải là file jpeg, png, jpg.",
        ];
    }
}
