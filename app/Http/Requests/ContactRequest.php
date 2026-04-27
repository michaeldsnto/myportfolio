<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:100',
            ],

            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ],

            'subject' => [
                'required',
                'string',
                'min:5',
                'max:200',
            ],

            'message' => [
                'required',
                'string',
                'min:20',
                'max:5000',
            ],

            'website' => [
                'nullable',
                'max:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'website.max' => 'Spam detected.',
        ];
    }
}