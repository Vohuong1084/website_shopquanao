<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nameproduct' => 'require',
            'content' => 'require',
            'menu_id' => 'require',
            'price' => 'require',
            'hinhanhproduct' => 'require',
            'soluong' => 'require',
            'color' => 'require',
            'size' => 'require',
        ];
    }
    public function messages() : array
    {
        return [
            'nameproduct.require' => 'Hãy nhập tên sản phẩm, không được để trống',
            'content.require' => 'Hãy nhập mô tả sản phẩm',
            'menu_id.require' => 'Hãy chọn tên Danh Mục, không được để trống',
            'price.require' => 'Hãy nhập giá, không được để trống',
            'hinhanhproduct.require' => 'Hãy nhập hình ảnh sản phẩm, không được để trống',
            'soluong.require' => 'Hãy nhập số lượng sản phẩm, không được để trống',
            'color.require' => 'Hãy chọn Màu của sản phẩm',
            'size.require' => 'Hãy chọn Kích Thước sản phẩm,'

        ];  
    }
}
