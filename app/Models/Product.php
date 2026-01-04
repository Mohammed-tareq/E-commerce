<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations, Sluggable;

    public $translatable = ['name', 'small_desc', 'desc'];

    protected $fillable = ['name', 'slug', 'small_desc', 'desc', 'status', 'sku', 'views', 'available_for', 'has_variants', 'price', 'has_discount', 'discount', 'discount_start', 'discount_end', 'manage_stock', 'qty', 'available_qty', 'category_id', 'brand_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImages::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
    public function reviews()
    {
        return $this->hasMany(ProductPreview::class);
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    public function isSimple()
    {
        return !$this->has_variants;
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
            get: fn($value) => (bool)$value ? __('dashboard.Active') : __('dashboard.Inactive')
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
