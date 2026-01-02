<?php

namespace App\Http\Requests\Dashboard\Faq;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'question' => 'required|array',
            'question.ar' => 'required|string|min:5|max:255',
            'question.en' => 'required|string|min:5|max:255',
            'answer' => 'required|array',
            'answer.ar' => 'required|string|min:10|max:5000',
            'answer.en' => 'required|string|min:10|max:5000',
        ];
    }
}
