<?php

namespace App\Http\Requests\film;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'name' => 'required|min:3|max:255',
            'details' => 'required',
            'image_url' => 'required|mimes:jpeg,png,jpg',
            'time' => 'required',
            'nation' => 'required',
            'premiere' => 'required',
            'genre' => 'required'
        ];
    }
    public function message() {
        return [
            'name.required' => "Tên không được để trống.",
            'name.min' => "Số ký tự tối thiểu là 3 ký tự.",
            'name.max' => "Số ký tự tối đa là 255 ký tự.",
            'details.required' => "Chi tiết không được để trống.",
            'image_url.required' => "Hình ảnh không được để trống.",
            'image_url.mimes' => "Hình ảnh phải là file jpeg, png, jpg.",
            'time.required' => "Thời gian không được để trống",
            'nation.required' => "Quốc gia không được để trống",
            'premiere.required' => "Thời lượng không được để trống",
            'genre.required' => "Thể loại không được để trống"
        ];
    }
}
