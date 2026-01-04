<?php

namespace App\Http\Requests\Dashboard\Attribute;

use CodeZero\UniqueTranslation\UniqueTranslationRule;
use Illuminate\Foundation\Http\FormRequest;

class AttributeRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name'=> ['required' , 'array'],
            'name.*' => ['required' , 'string','min:5','max:50' ,UniqueTranslationRule::for('attributes', 'name')->ignore($this->route('attribute'))],
            'attribute_value'=> ['required' , 'array'],
            'attribute_value.*.ar' => ['required' , 'string','min:5','max:60'],
            'attribute_value.*.en' => ['required' , 'string','min:5','max:60']
        ];
    }
}
