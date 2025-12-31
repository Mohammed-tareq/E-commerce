<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Brand extends Model
{
    use Sluggable, HasTranslations;

    protected $fillable = ['name', 'slug', 'status', 'image'];

    public $translatable = ['name'];


    public function products()
    {
        return $this->hasMany(Product::class);
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

    public function image():Attribute
    {
        return Attribute::make(
            get: fn($value) => 'uploads/brands/'.$value
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
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
