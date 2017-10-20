<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }

    public function index()
    {
        $user = Auth::user();
        $user_posts = Auth::user()->posts;
        // dd($user_posts);
        $posts = Post::orderBy('votes', 'desc')->get();
        return view('dashboard.index', compact('posts', 'user', 'user_posts'));
        
    }
}
