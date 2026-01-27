<?php

namespace App\Http\Requests\Dashboard\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'note' => ['array', 'sometimes'],
            'note.*' => ['sometimes', 'required', 'max:50'],
            'image' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,jpg,gif,svg'],
        ];
    }
}
