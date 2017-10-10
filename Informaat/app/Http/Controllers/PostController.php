<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }

    public function upvote(Post $post)
    {
        $user = Auth::user();
        
        if(!$user->hasUpvoted($post) || !$user->hasVoted($post))
        {
            if($user->hasDownvoted($post) )
            {
                $post->increment('votes', 2);
            } 
            else
            {
                $post->increment('votes');
            }

            $user->cancelVote($post);      
            $user->upVote($post);
        }

        

        return back();
    }
    public function downvote(Post $post)
    {
        $user = Auth::user();

        if(!$user->hasDownvoted($post) || !$user->hasVoted($post))
        {

            if($user->hasUpvoted($post))
            {
                $post->decrement('votes', 2);
            } 
            else 
            {
                $post->decrement('votes');
            }

            $user->cancelVote($post);
            $user->downVote($post);
            
        }

        return back();
    }
    public function cancelvote(Post $post)
    {
        $user = Auth::user();
        
        if($user->hasUpvoted($post))
        {
            $post->decrement('votes');
        }
        if($user->hasDownvoted($post))
        {
            $post->increment('votes');
        }
        $user->cancelVote($post);
        
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // votes in table en elke up/downvote tabel aanpassen
        // niet efficient --> mogelijk betere oplossing vinden
        $user = Auth::user();
        $posts = Post::orderBy('votes', 'desc')->get();
        return view('post.index', compact('posts', 'user'));
        
    }
    public function show(Post $post)
    {
        $user = Auth::user();
        
        return view('post.show', compact('post','user'));
        
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
        return view('post.edit', compact('post'));
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
        $post->update($request->all());
        

        return redirect('posts/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Post $post)
    {
        $post->delete($request->all());
        
        session()->flash('message', 'Deleted succesfull ');

        return redirect('posts/');
    }
}
