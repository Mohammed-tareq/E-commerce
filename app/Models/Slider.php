<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Slider extends Model
{
    use HasTranslations;

    protected $fillable = ['image','note'];

    public $translatable = ['note'];

    public function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => 'uploads/sliders/' . $value,
        );
    }

}
