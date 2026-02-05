<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
