<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Page extends Model
{
    use HasTranslations;


    protected $fillable = ['title', 'slug', 'content', 'image', 'status'];

    public $translatable = ['title', 'content'];


    public function ScopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
        );

    }
    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value == 1 ? __('dashboard.Active') : __('dashboard.Inactive')
        );

    }


}
