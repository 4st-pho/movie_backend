<?php

namespace App\Http\Requests;

use App\Rules\RoomRule\RoomTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'required',
            'type_id' => [
                new RoomTypeRule(),
                'required',
                'integer'
            ],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Đặt tên cho rạp',
            'type_id.required' => 'Đặt thuộc tính cho rạp',
            'type_id.integer' => 'Thuộc tính phải là số nguyên'
        ];
    }
}
