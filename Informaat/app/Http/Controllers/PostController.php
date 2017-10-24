<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use App\Favorite;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;


class PostController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
        
    }

    public function search(){
        
        $keyword = Input::get('keyword', '');
        $searchPost = Post::SearchByKey($keyword)->get();
        $user = Auth::user();
        
        return view('post.search', compact('searchPost', 'user'));
    }

    public function sort(){
        
        
        $keyword = Input::get('sort');
        $sort_var = explode(" ", $keyword);

        Session::put('sort_var', $sort_var);
        Session::put('option', $keyword);
        return back();        
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
            session()->flash('message', 'Upvoted '.$post->title);
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
            session()->flash('message', 'Downvoted '.$post->title);
            
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
        session()->flash('message', 'Cancel vote for '.$post->title);
        
        return back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        if(session()->has('sort_var'))
        {
            $sort = session('sort_var');
                        
            $posts = Post::orderBy($sort[0], $sort[1])->paginate(5);

            $number_of_page = $posts->currentPage();
            
        } else {
            $posts = Post::orderBy('votes', 'desc')->paginate(5);
            
        }
        $tops = Post::orderBy('votes', 'desc')->take(4)->get();
        
        return view('post.index', compact('posts', 'user', 'tops'));
        
    }
    public function show(Post $post)
    {
        $user = Auth::user();
        
        $comments = Comment::where('post_id', $post->id)->orderBy('votes', 'desc')->paginate(5);
        
        return view('post.show', compact('post','user', 'comments'));
        
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
            'topic' => 'required',
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
        $this->validate(request(), [
            'title' => 'required|min:2',
            'body' => 'required',
            'topic' => 'required',
        ]);
        
        $post->update($request->all());
        
        session()->flash('message', 'Updated succesfull ');
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
