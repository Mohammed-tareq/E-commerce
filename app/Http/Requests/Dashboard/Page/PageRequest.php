<?php

namespace App\Http\Requests\Dashboard\Page;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title.*' => ['required' , 'string' , 'min:3' , 'max:35'],
            'content.*' => ['required' , 'string' , 'min:3' , 'max:5000000'],
            'image' => ['sometimes' , 'image' , 'mimes:jpeg,png,jpg,gif,svg,webp' , 'max:2048'],
            'status' => ['required' , 'in:0,1']
        ];
    }
}
