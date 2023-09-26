<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    use HasFactory;

    protected $with = ["user", "likes", "comments"];

    // Gönderiyi oluşturan kullanıcı ilişkisi (bir gönderi bir kullanıcıya aittir)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Gönderinin beğenileri ilişkisi (bir gönderinin birden çok beğenisi olabilir)
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Gönderinin yorumları ilişkisi (bir gönderinin birden çok yorumu olabilir)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // public function getLikesCountAttribute()
    // {
    //     return DB::table('likes')->where('post_id', $this->id)->count();
    // }
}
