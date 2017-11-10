@extends('layouts.landing')

@section('content')
<div class="container container-margin">

<!-- begin new layout -->

    <div class="row z-depth-2 show-wrapper" >
        
        <div class="col m2 s10 icon-column">
        <div class="valign-wrapper icon-wrapper" >
            @if($post->topic === "muziek")
                <img src="http://web-project.local/img/icon_sound.svg" alt="" class="img-full-width"></div>
            @elseif($post->topic === "techniek")
                <img src="http://web-project.local/img/icon_techniek.svg" alt="" class="img-full-width"></div>
            @else
                <img src="http://web-project.local/img/icon_social.svg" alt="" class="img-full-width"></div>
            @endif
        </div>
        <div class="col s2 hide-on-med-and-up center-align">
            @if($post->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $post->user->jeugdhuis))

            <a href="/posts/{{$post->id}}/edit" class="btn-floating waves-effect waves-light  blue lighten-3 right">
                <i class="material-icons right tiny">edit</i>
            </a>

            @endif
        </div>
        <div class="col m10 s12">
        
            <div class="col  m10 s12 ">
            <h4 class="card-title flow-text"><b>{{$post->title}}</b></h4>
            <hr>
            </div>
            <div class="col m2 hide-on-small-only ">
                @if($post->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $post->user->jeugdhuis))
                
                <a href="/posts/{{$post->id}}/edit" class="btn-floating waves-effect waves-light  blue lighten-3 right">
                    <i class="material-icons right tiny">edit</i>
                </a>
                @endif
            </div>
            <div class="col s12 col-min-height">
                <i class="card-body">{{$post->body}}</i>
            </div>
            <div class="col s12">
                @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                    <small><b>Tags: </b>{{$post->tag1}} | {{$post->tag2}} | {{$post->tag3}}</small>
                @endif
                <p><small><b>Geplaatst door: </b> {{$post->user->name}} van {{$post->user->jeugdhuis->name}}</small></p>
            </div>

            <div class="col m10 s12 center-align row">
                <div class="info-post">
                {{ $post->votes }}<i class="fa fa-arrow-circle-o-up fa-fw info-votes" aria-hidden="true" ></i> 
                </div>
                <div class="info-post">
                {{count($post->comments)}} <i class="material-icons tiny info-comments">message</i>
                </div>
                <div class="info-post">
                {{$diff_time}} <i class="material-icons tiny info-time">schedule</i> 
                </div>
            </div>
            <div class="col m1 s6  downvote upvote" >
                @if( count($post->favorites->where('user_id', auth()->id())) ) 
                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}               
                      <button type="submit" class="star">
                        <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                      </button>
                    </form>
                @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST">
                      {{ csrf_field() }} 
                      <button type="submit" class="star"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></button>
                    </form>
                  @endif
            </div>
            <div class="col m1 s6 downvote upvote" >
                @if(!$user->hasVoted($post))
                    <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a></object>
                    <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a></object>
                @else
                    @if($user->hasUpVoted($post))
                        <object><a href="/posts/{{$post->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up fa-3x" aria-hidden="true" ></i></a></object>
                        <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a></object>
                    @endif
                    @if($user->hasDownVoted($post))
                        <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a></object>
                        <object><a href="/posts/{{$post->id}}/cancelvote" class="downvote  cancelvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true" ></i></a></object>
                    @endif
                @endif
            </div>
            
            
            
        </div>

    </div>
<hr>
<br>
    <!-- new layout -->
<blockquote>Reacties</blockquote>

    <hr>
    <div id="comments">
    @if(count($comments) != 0)
    @foreach($comments as $comment)
    <div class="card horizontal z-depth-2">
      <div class="card-image card-image-comment">
          <div class="comment-wrapper">
            <p class="text-center">{{ $comment->votes }}</p>
            @if(!$user->hasVoted($comment))
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote comment-upvote" ><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a>
            @else
                @if($user->hasUpVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="upvote comment-upvote cancelvote"><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/downvote" class="downvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a>
                @endif
                @if($user->hasDownVoted($comment))
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/upvote" class="upvote comment-upvote" ><i class="fa fa-caret-up fa-3x" aria-hidden="true"></i></a>
                    <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/cancelvote" class="downvote cancelvote comment-downvote"><i class="fa fa-caret-down fa-3x" aria-hidden="true"></i></a>
                @endif
            @endif
            </div>
      </div>
      <div class="card-stacked">
        <div class="card-content card-content-comment">
            <h4 class="card-title flow-text"><b>{{$comment->title}}</b></h4>
                <i>{{$comment->body}}</i>
        </div>
        @if($comment->user_id == Auth::user()->id || Auth::user()->isAdmin || (Auth::user()->moderator && Auth::user()->jeugdhuis == $comment->user->jeugdhuis))
        <div class="card-action card-action-comment">
            <p><small> <b>Geplaatst door:</b> {{$comment->user->name}} van {{$comment->user->jeugdhuis->name}}</small></p>
            <div class="info-post">
            {{$comment->created_at->diffForHumans()}} <i class="material-icons tiny info-time">schedule</i> 
            </div>
            <a href="/posts/{{$post->id}}/comment/{{$comment->id}}/edit" class="btn-floating waves-effect waves-light  blue lighten-3 right edit-comment" >
                <i class="material-icons right tiny">edit</i>
            </a>
         
        </div>
        @endif
      </div>
    </div>
    @endforeach
    <hr>
    @else
    <small>Nog geen reactie's, wees de eerste om te reageren!</small>
    <br>
    @endif
    </div>
    {{ $comments->links() }}

    
   


    

    <ul class="collapsible hoverable collapse-margin" data-collapsible="accordion">
        <li>
            <div class="collapsible-header btn collapse-header-height ">
                <i class="material-icons"></i>Reactie plaatsen
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