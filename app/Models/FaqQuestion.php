<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class FaqQuestion extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function createdAt():Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
        );
    }
}
