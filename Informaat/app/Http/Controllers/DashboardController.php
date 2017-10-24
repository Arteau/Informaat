<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Jeugdhuis;
use Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }
    
    public function jeugdhuis()
    {
        $id = Auth::user()->jeugdhuis->id;
        
        $jeugdhuis = Jeugdhuis::find($id);

        $users = $jeugdhuis->users;

        return view('dashboard.jeugdhuis', compact('users', 'jeugdhuis'));
        
    }

    public function index()
    {
        $user = Auth::user();
        
        $user_posts = Auth::user()->posts;

        $favorite_posts = Auth::user()->favorites;
        $comments = Auth::user()->comments;
        $posts = Post::orderBy('votes', 'desc')->get();
        return view('dashboard.index', compact('posts', 'user', 'user_posts', 'favorite_posts', 'comments'));
        
    }
}
