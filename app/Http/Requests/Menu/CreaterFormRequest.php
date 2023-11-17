<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class CreaterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'hinhanh' => 'required'
        ];
    }
    public function messages() : array
    {
        return [
            'name.required' => 'Hãy nhập tên Danh Mục',
            'hinhanh.required' => 'Hãy chọn Hình Ảnh'
        ];
    }
}
