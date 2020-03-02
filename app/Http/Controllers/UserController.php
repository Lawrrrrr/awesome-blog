<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function list()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('users.list', compact('users'));
    }

    public function show($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        if($posts->count() > 0) {
            $posts = $posts->sortByDesc('created_at');
        }

        return view('users.show', compact('user', 'posts'));
    }

    // public function posts($id)
    // {
    //     $post = User::find($id)->posts->sortByDesc('created_at');

    //     return view('users.list', compact('post'));
    // }
}
