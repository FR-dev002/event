<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class LoginRequest extends RequestAbstract
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
            'username' => 'required|max:255|min:5',
            "password" => "required"
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
            'username.required'  => 'username harus diisi',
            'username.min'  => 'MInimal username 5 Karakter',
            'username.max'  => 'Maksimal username 255 Karakter',
            "password.required" => 'Password'
        ];
    }
}
