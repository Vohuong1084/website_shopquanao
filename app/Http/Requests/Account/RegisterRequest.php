<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required | email',
            'password' => 'required',
            'hinhanh' => 'required'
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Tên đăng nhập không được bỏ trống',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được bỏ trống',
            'hinhanh.required' => 'Hình ảnh không được bỏ trống'
        ];
    }
}
