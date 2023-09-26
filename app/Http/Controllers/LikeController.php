<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function like(Post $post)
    {
        $user = auth()->user();
        $user_id = $user->id;
        $post_id = $post->id;

        // Kullanıcının belirli bir gönderiye "like" atıp atmadığını kontrol etmek için bir sorgu yapın
        $existingLike = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
        if (!$existingLike) {
            // Eğer bu kullanıcı daha önce bu gönderiye "like" atmadıysa, yeni bir "like" kaydı oluşturun
            $like = new Like();
            $like->user_id = $user_id;
            $like->post_id = $post_id;
            $like->save();

            // İlgili posta "like" eklendiğini işaretlemek için başka bir işlem yapabilirsiniz (örneğin, sayacı artırabilirsiniz).
            // Örneğin: $post->increment('like_count');
            return back();
        } else {
            $existingLike->delete();
            return back();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Like $like)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Like $like)
    {
        //
    }
}
