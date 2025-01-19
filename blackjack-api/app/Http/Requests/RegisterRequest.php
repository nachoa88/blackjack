<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nickname' => [
                'nullable',
                'string',
                Rule::unique('users', 'nickname')->where(function ($query) {
                    return $query->where('nickname', '!=', 'Anonymous');
                }),
            ],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'nickname' => $this->nickname ?? 'Anonymous',
        ]);
    }
}
