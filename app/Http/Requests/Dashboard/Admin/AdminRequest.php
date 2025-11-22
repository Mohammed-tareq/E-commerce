<?php

namespace App\Http\Requests\Dashboard\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminRequest extends FormRequest
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
        $data = [
            'name' => 'required|string|min:2|max:100',
            'email' => [
                'required',
                'email',
                'max:100',
                Rule::unique('admins', 'email')->ignore($this->route('admin')),
            ],
            'role_id' => 'required|exists:roles,id',
            'status' => 'required|in:1,0',
            'password' => 'required|string|min:8|max:100|confirmed',
            'password_confirmation' => 'required|string|min:8|max:100',
        ];

        if(in_array($this->method(), ['PUT', 'PATCH'])) {
            $data['password'] = 'nullable|string|min:8|max:100|confirmed';
            $data['password_confirmation'] = 'nullable|string|min:8|max:100';
        }
        return $data;
    }
}
