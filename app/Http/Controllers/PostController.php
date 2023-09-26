<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("home.new");
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
        $request->validate([
            "title" => "required|min:5|max:255",
            "description" => "required|min:10|max:1000",
            "user_id" => "required|exists:users,id",
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('uploads', $imageName, 'public'); // Resmi "public/images" klasörüne kaydet


            $post = new Post();

            $post->title = $request->title;
            $post->description = $request->description;
            $post->user_id = $request->user_id;
            $post->image = $imageName;


            $post->save();

            return redirect()->back()->with('success', 'Post əlavə olundu.');
        }

        return redirect()->back()->with('error', 'Xəta baş verdi!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        //
        $post = Post::find($id);

        $comments = $post->comments;
        $likeCount = Like::where('post_id', $post->id)->count();

        // dd($comments);

        return view("home.details",compact("post","comments","likeCount"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
