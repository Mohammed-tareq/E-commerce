<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class City extends Model
{
    use HasTranslations;
    public $timestamps = false;
    protected $fillable = ['name','governorate_id'];
    protected $translatable = ['name'];
}
