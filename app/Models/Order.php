<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Order extends Model
{
    protected $fillable = [
        "user_id",
        "first_name",
        "last_name",
        "user_phone",
        "user_email",
        "country",
        "city",
        "governorate",
        "street",
        "notes",
        "price",
        "shipping_price",
        "total_price",
        "coupon",
        "coupon_discount",
        "status",
    ];


    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItems::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
        );
    }
}
