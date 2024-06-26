<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
       $posts = Post::orderBy('tanggalDibuat', 'desc')->join('users', 'users.userID', '=', 'post.userID')->select(['post.*', 'users.*'])->get();
        return view('home', compact('posts'));
    }
}
