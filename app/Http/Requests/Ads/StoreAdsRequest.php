<?php

namespace App\Http\Requests\Ads;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdsRequest extends FormRequest
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
            'title' => 'required|max:255',
            'adv_image_path' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Hãy đặt tiêu đề cho quảng cáo',
			'name.max' => "Tiêu đề quá dài",
            'adv_image_path.required' => 'Bạn chưa chọn ảnh quảng cáo'
        ];
    }
}
