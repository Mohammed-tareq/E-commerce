<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItems extends Model
{
    protected $fillable = [
        "order_id",
        "product_id",
        "product_variant_id",
        "product_name",
        "product_desc",
        "product_quantity",
        "product_price",
        "attributes",
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
