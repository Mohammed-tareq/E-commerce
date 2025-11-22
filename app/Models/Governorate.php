<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'country_id',
    ];
    protected $translatable = ['name'];

}
