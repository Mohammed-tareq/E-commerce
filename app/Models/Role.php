<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Role extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];

    protected $fillable = ['name','permissions'];


    protected $casts = [
        'permissions' => 'array'
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }
}
