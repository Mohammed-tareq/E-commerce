<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Product extends Model
{
    use HasTranslations;

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
        return $this->hasMany(ProductImages::class, 'product_id');
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

    public function scopeActive($q)
    {
        return $q->where('status', 1);
    }

    public function isSimple(): bool
    {
        return !$this->has_variants;
    }

    public function imagesPath(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->images->map(fn($image) => $image->name)
        );
    }

    public function hasVariants()
    {
        return $this->isSimple() ? __('dashboard.no_has_variants') : __('dashboard.has_variants');
    }

    public function price()
    {
        return $this->isSimple() ? $this->price : __('dashboard.has_variants');
    }

    public function qty()
    {
        return $this->isSimple() ? $this->qty : __('dashboard.has_variants');
    }

    public function getPriceAfterDiscount()
    {
        if ($this->has_discount) {
            return $this->price - $this->discount;
        }
        return $this->price;

    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
        );
    }

    public function updatedAt(): Attribute
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

    protected static function booted()
    {
        static::creating(function ($model) {
                $model->sku ??= Str::uuid()->toString();

        });
    }

}
