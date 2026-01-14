<?php

namespace App\Http\Requests\Dashboard\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => ['required','string','min:3' , 'max:50'],
            'email' => ['required' , 'email:rfc,dns','unique:users,email'],
            'password'=>['required' , 'string' , 'min:5' , 'max:50'],
            'status' => ['required' , 'string','in:0,1'],
            'country_id' => ['required' , 'integer','exists:countries,id'],
            'governorate_id' => ['required' , 'integer','exists:governorates,id'],
            'city_id' => ['required' , 'integer','exists:cities,id'],
            'image' => ['sometimes','image'],
            'phone'=>['required' , 'string' , 'min:9', 'max:20','unique:users,phone'],
        ];
    }
}
