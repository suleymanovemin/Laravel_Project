<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Kullanıcının gönderileri ilişkisi (bir kullanıcının birden çok gönderisi olabilir)
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Kullanıcının beğenileri ilişkisi (bir kullanıcının birden çok beğenisi olabilir)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Kullanıcının yorumları ilişkisi (bir kullanıcının birden çok yorumu olabilir)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}
