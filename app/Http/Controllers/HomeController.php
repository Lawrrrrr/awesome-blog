<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Post;
use File;

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
            "last_name" => "required|max:255"
        ]);

        if(!empty($request->new_password))
        {
            $request->validate([
                "new_password" => "required|min:8|max:255|confirmed"
            ]);

            auth()->user()->update([
                'password' => Hash::make($request->new_password)
            ]);
        }
        // dd($request->all());
        auth()->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
        ]);

        return redirect()->route('home');
    }

    public function changeAvatar()
    {
        return view('change_avatar');
    }

    public function uploadAvatar(Request $request)
    {
        $oldAvatar = auth()->user()->avatar;

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048'
        ]);

        if($oldAvatar != 'noface.jpg')
        {
            File::delete($oldAvatar);
        }

        // getClientOriginalExtension() a function which gets the extension name/type of the image
        $fileName = time() . '.' . $request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('images'), $fileName);

        auth()->user()->update([
            'avatar' => $fileName
        ]);
        // dd($request->all());
        // if(!strcmp($oldAvatar, 'noface.jpg'))
        // {
        //     File::delete($oldAvatar);
        // }
        
        return redirect()->route('home.change_avatar');
    }

}
