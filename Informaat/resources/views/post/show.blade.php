@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
@if ($flash = session('message'))

    <script>
    $(function() {
      Materialize.toast('{{$flash}}', 4000);
    });
    </script>
    
@endif
    <div class="card horizontal z-depth-2">
      <div class="card-image">
        <img src="https://maxcdn.icons8.com/Share/icon/color/Gaming//pokecoin1600.png" style="width:60%">
      </div>
      <div class="card-stacked">
        <div class="card-content">
              {{ $post->votes }}
                @if(!$user->hasVoted($post))
                <a href="/posts/{{$post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                <a href="/posts/{{$post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @else
                    @if($user->hasUpVoted($post))
                        <a href="/posts/{{$post->id}}/cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                        <a href="/posts/{{$post->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                    @endif
                    @if($user->hasDownVoted($post))
                        <a href="/posts/{{$post->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                        <a href="/posts/{{$post->id}}/cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                    @endif
                @endif
                @if( count($post->favorites->where('user_id', auth()->id())) )

                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </button>
                    </form>
                  
                  @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                    </form>

                  @endif

                <h2 class="card-title">{{$post->title}}</h2>
                <i>{{$post->body}}</i>
                <hr>
                
                <p>Onderwerp: {{$post->topic}}</p> 
                @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
                @endif
        </div>
        <div class="card-action">
          <a href="/posts/{{$post->id}}/edit">Edit post</a>
        </div>
      </div>
    </div>
    <hr>
    
    @foreach($comments as $comment)
    <div class="card horizontal z-depth-2">
      <div class="card-image">
       <!-- image here -->
      </div>
      <div class="card-stacked">
        <div class="card-content">
        {{ $comment->votes }}
            @if(!$user->hasVoted($comment))
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
            @else
                @if($user->hasUpVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                @endif
                @if($user->hasDownVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                @endif
            @endif
            

                <h2 class="card-title">{{$comment->title}}</h2>
                <i>{{$comment->body}}</i>
                <small> Gepost: {{$comment->created_at->diffForHumans()}} by
                {{$comment->user->name}}</small>
        </div>
        <div class="card-action">
          <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit">Edit comment </a>
        </div>
      </div>
    </div>
    @endforeach
    {{ $comments->links() }}

    
    <hr>


    

    <ul class="collapsible hoverable " data-collapsible="accordion">
        <li>
            <div class="collapsible-header light-green accent-1">
                <i class="material-icons"></i>Commentaar toevoegen
            </div>
            <div class="collapsible-body">
                <form action="/posts/{{ $post->id }}/comment/store" method="POST">
                        {{ csrf_field() }}
                        
                    <div class="input-field">
                        <label for="title">Titel</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                    </div>

                    <div class="input-field">
                        <label for="body">Commentaar</label>
                        <input type="text" name="body" id="body" value="{{ old('body') }}" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Publish comment</button>
                    <a href="/posts"><div class="btn btn-danger">Back</div></a>
            
                </form>
            </div>
        </li>
    </ul>
    
</div>

@endsection