<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class ProductImages extends Model
{
    protected $fillable = ['product_id', 'name', 'size', 'type'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function name():Attribute
    {
        return Attribute::make(
            get: fn($value)=> 'uploads/products/'.$value
        );
    }
}

