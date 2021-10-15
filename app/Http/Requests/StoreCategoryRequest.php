<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => ['required','min:3','max:255', Rule::unique('categories','name')->whereNull('deleted_at')],
            'description' => ['nullable'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên thể loại không được bỏ trống',
            'name.min' => 'Độ dài của tên tối thiểu là 3 kí tự',
            'name.max' => 'Độ dài của tên tối đa là 255 kí tự',
            'name.unique' => 'Tên này đã tồn tại',
        ];
    }
}
