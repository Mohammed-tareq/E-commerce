<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Governorate extends Model
{
    use HasTranslations;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'country_id',
        'status',
    ];
    protected $translatable = ['name'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function shippingPrices()
    {
        return $this->hasOne(ShippingPrice::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? __('dashboard.Active') : __('dashboard.Inactive')
        );

    }
}
