<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

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


    public function scopeValid($query)
    {

        return $query->where('status', 1)
            ->whereColumn('used', '<', 'limiter')
            ->where('start_date', '<=', today())
            ->where('end_date', '>', today());
    }


    public function scopeInvalid($q)
    {
        return $q->where('status', 0)
            ->orWhere('used', '>=', 'limiter')
            ->orWhere('end_date', '<', today());
    }

    public function isValid(): bool
    {
        return (bool)$this->getRawOriginal('status') === true
            && $this->used < $this->limiter
            && $this->start_date <= today()
            && $this->end_date >= today();
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
