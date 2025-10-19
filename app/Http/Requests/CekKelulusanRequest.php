<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CekKelulusanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nim' => [
                'required',
                'string',
                'min:10',
                'max:10',
                'regex:/^[0-9]+$/'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nim.required' => 'NIM wajib diisi',
            'nim.string' => 'NIM harus berupa teks',
            'nim.min' => 'NIM harus 10 digit',
            'nim.max' => 'NIM harus 10 digit',
            'nim.regex' => 'NIM hanya boleh berisi angka',
        ];
    }
}
