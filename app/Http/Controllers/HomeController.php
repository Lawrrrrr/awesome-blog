<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $posts = auth()->user()->posts()->orderBy('created_at', 'desc')->get();
        $posts = auth()->user()->posts->sortByDesc('created_at');

        return view('home', compact('posts'));
    }

    public function edit()
    {
        return view('edit');
    }

    public function update(Request $request)
    {

        $request->validate([
            "first_name" => "required|max:255",
            "last_name" => "required|max:255",
            "new_password" => "required|max:255|min:8|confirmed"
        ]);
        // dd($request->all());
        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            "new_password" => $request->new_password
        ]);

        return redirect()->route('home');
    }

}
