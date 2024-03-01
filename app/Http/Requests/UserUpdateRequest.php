<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'surname' => 'string|min:1|max:64',
            'name' => 'string|min:1|max:64',
            'tel' => 'integer|max:11',
            'email' => 'string|min:1|max:64|unique:users',
            'login' => 'string|min:8|max:64|unique:users|regex:/^[A-Za-z]+$/u',
            'password' => 'string|min:8|max:255|regex:/^[A-Za-z]+$/u',
        ];
    }
    public function messages()
    {
        return[
            'surname.min' => 'min 1',
            'surname.max' => 'max 64',
            'name.min' => 'min 1',
            'name.max' => 'max 64',
            'tel.max' => 'max 11',
            'email.unique' => 'Данный email-адрес уже существует.',
            'login.unique' => 'Данный логин уже существует.',
            'login.regex' => 'Используйте только латинские символы.',
            'login.min' => 'Используйте в поле «Логин/Пароль» не менее 8 символов.',
            'password.min' => 'Используйте в поле «Логин/Пароль» не менее 8 символов.',
            'password.regex' => 'Используйте только латинские символы.',
        ];
    }
}
