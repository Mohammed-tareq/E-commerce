<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected $fillable = [
        'code',
        'discount_percentage',
        'start_date',
        'end_date',
        'limiter',
        'used',
        'status',
    ];


    public function scopeValid($q)
    {
        return $q->where('status', 1)
            ->where('used', '<', 'limiter')
            ->where('end_date', '>=', now());
    }

    public function scopeInvalid($q)
    {
        return $q->where('status', 0)
            ->orWhere('used', '>=', 'limiter')
            ->orWhere('end_date', '<', now());
    }

    public function isValid()
    {
        return $this->getRawOriginal('status') == true && $this->used > $this->limiter && $this->end_date >= now();
    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($valus) => (bool)$valus ? __('dashboard.Active') : __('dashboard.Inactive')
        );
    }

    public function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($value) => date('Y-m-d', strtotime($value))
        );
    }
}
