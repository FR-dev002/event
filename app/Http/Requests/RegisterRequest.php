<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class RegisterRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstName' => 'required|max:255|min:3',
            'username' => 'required|unique:users|max:255|min:5',
            'email' => 'required|unique:users|max:255|min:5',
            'password' => 'required|min:6',
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'firstName.required' => 'FirstName harus diisi',
            'firstName.min' => 'Minimal FirstName 3 karakter',
            'firstName.max'  => 'Maksimal FirstName 255 Karakter',
            'username.required'  => 'username harus diisi',
            'username.min'  => 'MInimal username 5 Karakter',
            'username.max'  => 'Maksimal username 255 Karakter',
            'username.unique'  => 'Username already exist',
            'email.required'  => 'Email harus diisi',
            'email.min'  => 'MInimal Email 5 Karakter',
            'email.max'  => 'Maksimal Email 255 Karakter',
            'email.unique'  => 'Email already exist',
            'password.required'  => 'Password harus Diisi',
            'password.min'  => 'Minimal password 6 Karakter',
        ];
    }
}
