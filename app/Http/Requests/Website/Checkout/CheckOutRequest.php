<?php

namespace App\Http\Requests\Website\Checkout;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            "first_name" => ['required', 'string', 'min:3', 'max:30'],
            "last_name" => ['required', 'string', 'min:3', 'max:30'],
            "user_phone" => ['required', 'string', 'min:10', 'max:15'],
            "user_email" => ['required', 'email:rfc,dns', 'max:50'],
            "country_id" => ['required', 'integer', 'exists:countries,id'],
            "governorate_id" => ['required', 'integer', 'exists:governorates,id'],
            "city_id" => ['required', 'integer', 'exists:cities,id'],
            "street" => ['sometimes', 'string', 'min:3', 'max:100'],
            "notes" => ['sometimes', 'string', 'min:3', 'max:100'],
        ];
    }
}
