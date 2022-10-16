<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'config_key' => 'required|unique:settings|max:255',
            'config_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Khóa không được để trống',
            'config_key.unique' => 'Khóa không được phép trùng',
            'config_key.max' => 'Khóa không được vượt quá 255 ký tự',
            'config_value.required' => 'Giá trị không được để trống',
        ];
    }
}
