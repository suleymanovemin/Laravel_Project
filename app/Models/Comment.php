<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ["user"];
    // Yorumu yapan kullanıcı ilişkisi (bir yorum bir kullanıcıya aittir)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Yorum yapılan gönderi ilişkisi (bir yorum bir gönderiye aittir)
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
