<?php

namespace App\Http\Requests\Dashboard\Category;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|array',
            'name.*' => [
                'required',
                'string',
                'max:100',
                UniqueTranslationRule::for('categories', 'name')->ignore($this->route('category')),
            ],
            'parent' => [
                'nullable',
                Rule::exists('categories', 'id')->where(function ($query) {
                    $query->whereNull('parent');
                })->whereNot('id', $this->route('id')),

            ],
            'image' => [ 'required', 'image', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            'status' => 'required|in:1,0',
        ];
    }
}
