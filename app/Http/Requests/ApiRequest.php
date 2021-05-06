<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiRequest extends FormRequest
{
    protected function failedValidation(Validator $validator, $code = 422)
    {
        throw new HttpResponseException(response()->json([
            'code' => $code,
            'message' => 'Ошибка валидации',
            'body' => collect($validator->errors())->map(fn($item) => $item[0])
        ], $code));
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательное',
            'email' => 'Неверный формат почты',
            'unique' => 'Такой пользователь уже существует',
            'confirmed' => 'Пароли не совпадают',
            'size' => ':attribute должен состоять из :size символов',
        ];
    }
}
