<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Beğeni sahibi kullanıcı ilişkisi (bir beğeni bir kullanıcıya aittir)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Beğeni yapılan gönderi ilişkisi (bir beğeni bir gönderiye aittir)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}
