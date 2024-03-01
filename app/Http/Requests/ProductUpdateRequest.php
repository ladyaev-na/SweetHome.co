<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'string|min:1|max:64|unique:products|regex:/^[A-Za-z]+$/u',
            'price' => 'decimal:12,2|min:0.01',
            'description' => 'string|min:1|max:255',
            'quantity' => 'string|min:1',
            'category_id' => 'integer|exists:categories,id',
        ];
    }
    public function messages()
    {
        return[
           'name.unique' => 'Данный продукт уже существует',
        ];
    }
}
