<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:1|max:64',
            'surname' => 'required|string|min:1|max:64',
            'login' => 'required|string|min:8|max:64|unique:users|regex:/^[A-Za-z]+$/u',
            'email' => 'required|string|min:1|max:64|unique:users',
            'password' => 'required|string|min:8|max:255|regex:/^[A-Za-z]+$/u',
            'tel' => 'required|integer',
        ];
    }
    public function messages()
    {
        return[
            'required' => 'Заполните поле :attribute',
            'login.unique' => 'Данный логин уже существует.',
            'login.regex' => 'Используйте только латинские символы.',
            'login.min' => 'Используйте в поле «Логин/Пароль» не менее 8 символов.',
            'password.min' => 'Используйте в поле «Логин/Пароль» не менее 8 символов.',
            'password.regex' => 'Используйте только латинские символы.',
            'email.unique' => 'Данный email-адрес уже существует.',
        ];
    }
}
