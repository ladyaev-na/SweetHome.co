<?php

namespace App\Http\Requests;
use App\Exceptions\AoiException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ApiRequest extends FormRequest
{
    function failedAuthorization()
    {
        throw new AoiException(401, 'Аутинфикация провалена');
    }

//Провал валидации
    function failedValidation(Validator $validator)
    {
        throw new AoiException(403, $validator->errors());
    }
}
