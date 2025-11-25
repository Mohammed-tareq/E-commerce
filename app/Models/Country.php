<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = [
        'name',
        'phone_code',
        'status',
    ];
    public $timestamps = false;

    public function governorates()
    {
        return $this->hasMany(Governorate::class);

    }

    public function users()
    {
        return $this->hasMany(User::class);

    }

    public function status(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value ? __('dashboard.Active') : __('dashboard.Inactive'),
        );
    }
}
