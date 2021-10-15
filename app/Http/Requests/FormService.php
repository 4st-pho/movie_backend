<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormService extends FormRequest
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
            'name' => 'required ',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required| integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => ' Bạn phải nhập tên cho dịch vụ',
            'image.required' => ' Bạn phải nhập file',
            'image.image' => ' File được chọn phải là file ảnh',
            'price.required' => ' Bạn phải nhập giá cho dịch vụ',
            'price.integer' => 'Giá tiền phải là kiểu số',
        ];
    }
}