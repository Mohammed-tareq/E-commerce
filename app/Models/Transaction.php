<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'order_id',
        'invoice_id',
        'payment_method',
        'user_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
