<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();
        $user->posts()->create(['content' => $request->content]);

        // $user->posts()->save($post);

        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     'content' => $request->content
        // ]);
        return redirect()->route('home');
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update([
            'content' => $request->content
        ]);

        return redirect()->route('home');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('home');
    }
}
