<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Auth;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }

    public function upvote(Post $post, Comment $comment)
    {
        
        $user = Auth::user();

        if(!$user->hasUpvoted($comment) || !$user->hasVoted($comment))
        {
            if($user->hasDownvoted($comment))
            {
                $comment->increment('votes', 2);
                
            } else 
            {
                $comment->increment('votes');
            }

            $user->cancelVote($comment);
            $user->upVote($comment);
        }

        return back();
    }

    public function downvote(Post $post, Comment $comment)
    {
        $user = Auth::user();

        if(!$user->hasDownvoted($comment) || !$user->hasVoted($comment))
        {

            if($user->hasUpvoted($comment))
            {
                $comment->decrement('votes', 2);
            } else 
            {
                $comment->decrement('votes');
            }

            $user->cancelVote($comment);
            $user->downVote($comment);
        }
        
        return back();
    }
    public function cancelvote(Post $post, Comment $comment)
    {
        $user = Auth::user();

        if($user->hasUpvoted($comment))
        {
            $comment->decrement('votes');  
        }
        if($user->hasDownvoted($comment))
        {
            $comment->increment('votes');  
        }

        $user->cancelVote($comment);
        
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|min:2|max:255',
            'body' => 'required|min:1|max:10000',
        ]);

        Comment::create([
            'title' => request('title'),

            'body' => request('body'),
            
            'post_id' => $post->id,

            'user_id' => auth()->id(),
        ]);

        // redirect to homepage
        session()->flash('message', 'Commentaar aangemaakt! ');

        return redirect('/posts/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post, Comment $comment)
    {
        
        
        return view('comment.edit', compact('comment', 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Comment $comment)
    {
        // dd($comment);
        session()->flash('message', 'Updated succesfull ');
        
        $comment->update($request->all());

        return redirect('/posts/'.$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, Post $post, Comment $comment)
    {
        $comment->delete($request->all());
        
        session()->flash('message', 'Deleted succesfull ');

        return redirect('posts/'.$post->id);
    }
}
