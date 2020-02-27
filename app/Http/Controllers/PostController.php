<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::orderby('updated_at', 'desc')->get();

        return view('home', compact('posts'));
    }

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
}
