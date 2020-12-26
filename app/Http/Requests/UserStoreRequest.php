<?php

namespace App\Http\Requests;

class UserStoreRequest extends ApiRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fio' => ['required', 'string'],
            'email' => ['required', 'unique:users,email', 'email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'role_id' => 'exists:roles,id',
            'tel' => 'required|size:11|string'
        ];
    }
}
