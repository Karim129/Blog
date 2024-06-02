<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\ImageService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->when(request('search'), function ($query) {

            $query->where('title', 'like', '%' . request('search') . '%');

        })->orderBy('created_at', 'desc')->paginate(10);
        return view('Posts/index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Posts/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => ImageService::upload($request->file('image'), 'posts'),
            'user_id' => auth()->user()->id,

        ]);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Posts/show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('Posts/edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => ImageService::upload($request->file('image'), 'posts'),
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        ImageService::delete($post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
