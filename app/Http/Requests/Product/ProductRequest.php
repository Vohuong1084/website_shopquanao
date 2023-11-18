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
        return false;
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
}
