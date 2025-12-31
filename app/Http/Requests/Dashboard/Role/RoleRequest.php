<?php

namespace App\Http\Requests\Dashboard\Role;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name.*' => 'required|string|max:70|'. UniqueTranslationRule::for('roles', 'name')->ignore($this->role),
            'permissions' => 'required|array|min:1',
        ];
    }
}
