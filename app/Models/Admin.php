<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

   public function haspermission($permission)
   {
       $admin = $this->role;
       if(!$admin || !is_array($admin->permissions))
       {
           return false;
       }
       return in_array($permission,$admin->permissions);
   }

   public function scopeActive($query)
   {
       return $query->where('status',true);
   }

   public function status(): Attribute
   {
       return Attribute::make(
           get: fn($valus) => (bool)$valus ? __('dashboard.Active') : __('dashboard.Inactive')
       );
   }

    public function receivesBroadcastNotificationsOn(): string
    {
        return 'admins.'.$this->id;
    }
}
