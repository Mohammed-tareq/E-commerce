<?php

namespace App\Http\Requests\Dashboard\Setting;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Setting;

class SettingRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $setting = Setting::first();

            return [
                'site_name'=>['required', 'array'],
                'site_name.*'=>['required', 'string' , 'min:5','max:50'],
                'site_desc'=>['required', 'array'],
                'site_desc.*'=>['required', 'string' , 'min:10','max:500'],
                'meta_desc'=>['required', 'array'],
                'meta_desc.*'=>['required', 'string' , 'min:10','max:500'],
                'site_copy_right'=>['required', 'array'],
                'site_copy_right.*'=>['required', 'string' , 'min:5','max:50'],
                'logo'=>!empty($setting->logo) ? ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'] : ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
                'favicon'=>!empty($setting->favicon) ? ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'] : ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
                'site_email'=>['required', 'email'],
                'email_support'=>['required', 'email'],
                'facebook'=>['sometimes', 'url'],
                'instagram'=>['sometimes', 'url'],
                'linkedin'=>['sometimes', 'url'],
                'youtube'=>['sometimes', 'url'],
                'promotion_video_url'=>['sometimes', 'url'],
        ];
    }
}
