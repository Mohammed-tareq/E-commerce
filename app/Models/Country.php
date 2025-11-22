<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'phone_code',
        'status',
    ];
    public $timestamps = false;

}
