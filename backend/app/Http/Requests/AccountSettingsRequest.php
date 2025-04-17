<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountSettingsRequest extends FormRequest
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
            "email" => "email:dns,rfc|unique:users,email,".$this->user()->id,
            'current_password' => 'string',
            'new_password' => 'nullable|string|min:8|different:password',
            'confirm_password' => 'nullable|string|same:new_password',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email is already taken.',
            'new_password.min' => 'The new password must be at least 8 characters.',
            'new_password.different' => 'The new password must be different from the current password.',
            'confirm_password.same' => 'The confirm password must match the new password.',
        ];
    }
}