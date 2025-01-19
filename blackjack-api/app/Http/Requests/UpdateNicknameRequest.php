<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNicknameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nickname' => [
                'nullable',
                'string',
                Rule::unique('users', 'nickname') // Check if the nickname is unique in the users table
                    ->ignore($this->route('user')) // Ignore the current user when checking for uniqueness
                    ->where(function ($query) { // Check if the nickname is different from 'Anonymous'
                        return $query->where('nickname', '!=', 'Anonymous');
                    }),
            ],
        ];
    }
}
