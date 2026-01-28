<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    public $translatable = [
        "site_name",
        "site_desc",
        "meta_desc",
        "site_copy_right",
    ];

    protected $fillable = [
        "site_name",
        "site_desc",
        "meta_desc",
        "site_copy_right",
        "logo",
        "favicon",
        "site_email",
        "email_support",
        "facebook",
        "instagram",
        "linkedin",
        'youtube',
        "promotion_video_url",
    ];

    public function logo(): Attribute
    {
        return Attribute::make(
            get: fn($value) => 'uploads/settings/' . $value,
        );
    }

    public function favicon(): Attribute
    {
        return Attribute::make(
            get: fn($value) => 'uploads/settings/' . $value,
        );
    }

    public function promotionVideoUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->convertToEmbed($value),
        );
    }

    public function convertToEmbed($url)
    {
        if(str_contains($url,'watch?v=')){
            return str_replace('watch?v=','embed/',$url);
        }
        return $url;
    }
}
