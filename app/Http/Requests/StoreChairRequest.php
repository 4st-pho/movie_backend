<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreChairRequest extends FormRequest
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
            'room_id' => 'required|numeric|gt:0',
            'location' => 'required|numeric|gt:0',
            'available' => 'required|boolean', 
            'coefficient' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/|gt:0',
            'double_chair' => 'required|boolean'
        ];
    }
}
