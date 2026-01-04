<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = ['product_id', 'name', 'size', 'type'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

