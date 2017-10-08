<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
        
    }
    public function show(Post $post)
    {
        
        return view('post.show', compact('post'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;

            $this->validate(request(), [
            'title' => 'required|min:2',
            'body' => 'required',
        ]);

        Post::create([
            'title' => request('title'),

            'topic' => request('topic'),

            'body' => request('body'),
            
            'tag1' => request('tag1'),

            'tag2' => request('tag2'),

            'tag3' => request('tag3'),

            'user_id' => auth()->id(),
        ]);

        // redirect to homepage
        session()->flash('message', 'Created succesfull ');


        return redirect('/posts');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
