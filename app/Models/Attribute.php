<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $fillable = ['name'];

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class, 'attribute_id');
    }
}
