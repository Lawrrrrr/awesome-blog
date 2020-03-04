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

        return view('users.index', compact('users'));
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

    public function follow($followed_id)
    {
        $follower = auth()->user();
        // $followed = User::find($followed_id);

        $follower->followedUsers()->attach($followed_id);

        return redirect()->back();
    }

    public function unfollow($followed_id)
    {
        $follower = auth()->user();
        // $followed = User::find($followed_id);

        $follower->followedUsers()->detach($followed_id);

        return redirect()->back();
    }

    public function userFollowers($followed_id)
    {
        $followed = User::find($followed_id);
        $users = $followed->followers()->get();

        return view('users.follower', compact('users'));
    }

    public function userFollowing($followed_id)
    {
        $followed = User::find($followed_id);
        $users = $followed->followedUsers()->get();

        return view('users.following', compact('users'));
    }

    // public function posts($id)
    // {
    //     $post = User::find($id)->posts->sortByDesc('created_at');

    //     return view('users.list', compact('post'));
    // }
}
