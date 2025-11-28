<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use Sluggable, HasTranslations;

    protected $fillable = ['name', 'slug', 'parent', 'status'];

    public $translatable = ['name'];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent');

    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 0);
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($valus) => (bool)$valus ? __('dashboard.Active') : __('dashboard.Inactive')
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($valus) => date('Y-m-d', strtotime($valus))
        );
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
