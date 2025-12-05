<?php

namespace App\Http\Requests\Dashboard\World;

use Illuminate\Foundation\Http\FormRequest;

class PriceRequest extends FormRequest
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
        $this->merge([
            'governorate_id' => $this->route('id'),
        ]);
        return [
            'price' => 'required|numeric|min:1|max:100000',
            'governorate_id' => 'required|exists:governorates,id',
        ];
    }
}
