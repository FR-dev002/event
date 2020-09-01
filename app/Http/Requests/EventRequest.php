<?php

namespace App\Http\Requests;

use Pearl\RequestValidate\RequestAbstract;

class EventRequest extends RequestAbstract
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:3',
            'description' => 'required|unique:events|max:255|min:5',
            'date' => 'required',
            'location' => 'required'
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
            'title.required' => 'Title harus diisi',
            'title.min' => 'Minimal Title 3 karakter',
            'title.max'  => 'Maksimal Title 255 Karakter',
            'description.required'  => 'Description harus diisi',
            'description.min'  => 'MInimal Description 5 Karakter',
            'description.max'  => 'Maksimal Description 255 Karakter',
            'date.required'  => 'Date harus diisi',
            'location.required'  => 'Location harus diisi'
        ];
    }
}
