<?php

namespace App\Http\Controllers\Api;

use App\Enums\Authorization\Permissions;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);
        
        $post = Post::create($validated);

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if(!auth()->user()->can(Permissions::ViewArticles->value)){
            abort(403);
        }
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $post->update($validated);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response('', 204);
    }
}
