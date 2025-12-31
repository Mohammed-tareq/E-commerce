<?php

namespace App\Http\Requests\Dashboard\Brand;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
        $data =   [
            'name' => 'required|array',
            'name.*' => [
                'required',
                'string',
                'max:100',
                UniqueTranslationRule::for('brands', 'name')->ignore($this->route('brand')),
            ],
            'image' => [ 'required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'status' => ['required', 'in:0,1'],
        ];
        if($this->method() == 'PUT' || $this->method() == 'PATCH') {
            $data['image'] = 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048';
        }
        return $data;
    }
}
