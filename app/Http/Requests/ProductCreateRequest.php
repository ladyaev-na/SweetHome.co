<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64|unique:products|regex:/^[A-Za-z]+$/u',
            'price' => 'required|decimal:0,2|min:0.01',
            'description' => 'required|string|min:1|max:255',
            'quantity' => 'required|string|min:1',
            'mass' => 'required|integer|min:1',
            'category_id' => 'required|integer|exists:categories,id',
            'file_id' => 'required|integer|exists:files,id'
        ];
    }

    public function messages()
    {
        return[
            'required' => 'Заполните поле :attribute',
            'name.unique' => 'Данный продукт уже существует',
        ];
    }
}
