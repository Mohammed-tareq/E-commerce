<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
        'star',
        'spam',
        'user_id',
        'replayed'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearchContact($query, $keyword)
    {
        return $query->when(
            filled($keyword),
            fn($q) => $q->where('email', 'like', "%{$keyword}%")
        );
    }


    public function scopeRead($q)
    {
        return $q->where('is_read', 1);
    }

    public function scopeUnread($q)
    {
        return $q->where('is_read', 0);
    }

    public function scopeStar($q)
    {
        return $q->where('star', 1);
    }

    public function scopeSpam($q)
    {
        return $q->where('spam', 1);
    }

    public function scopeReplay($q)
    {
        return $q->where('replayed', 1);
    }
}
