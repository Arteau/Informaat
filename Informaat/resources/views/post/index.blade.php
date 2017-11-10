@extends('layouts.landing')

@section('content')
    <!-- /.container -->
<div class="container container-margin">

  
<blockquote>
  Top posts deze week
</blockquote>

  <div class="row">
 @if(count($tops) > 0)
  @foreach($tops as $top)
  <a href="/posts/{{$top->id}}">
    <div class="col s6 m3" class="top">
      <div class="card hoverable">
        <div class="card-image card-image-top-post valign-wrapper">
          @if($top->topic == "techniek")
            <img src="{{asset('img/icon_techniek_white.svg')}}" class="card-image-top-image" alt=""> 
          @elseif($top->topic == "sociaal")
            <img src="{{asset('img/icon_social_white.svg')}}" class="card-image-top-image" alt=""> 
          @else
            <img src="{{asset('img/icon_sound_white.svg')}}" class="card-image-top-image" alt=""> 
          @endif
          <span class="card-title"></span>
        </div>
        <div class="card-content card-content-top-post">
        <span class="top-post-icon-wrapper">
          <i aria-hidden="true" class="fa fa-arrow-circle-o-up fa-fw top-post-icon"></i>
          <span class="top-post-icon-number">{{ $top->votes }}</span>
        </span> 
        <b><p class="truncate center-align white-text">{{$top->title}}</p></b>
         
        </div>
        <div class="card-action center-align black-text top-post-bottom">
          Lees meer
        </div>
      </div>
    </div> 
  </a>
  @endforeach
  @else
  <div class="col s6 m3" class="top">
  <p>Er zijn nog geen top posts</p>
  </div>

  @endif
  </div>

 <hr>
  <div class="row">
    <div class="col m6 s12">
      <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}

          @include ('layouts.errors')
          <label for="keyword">Zoeken</label>
          <input type="text" name="keyword" id="keyword"  class="field-input width-100">
      </form>
    </div>

    <div class="col m6 s12">
      <form role="sort" class="app-sort" id="sort-form" action="/posts/sort" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="keyword">Sorteer op</label>
              <select class="field-input"  name="sort" id="sort">
                <option value="created_at desc" @if(session('option') == "created_at desc") selected @endif>Jongste eerst</option>
                <option value="created_at asc" @if(session('option') == "created_at asc") selected @endif>Oudste eerst</option>
                <option value="votes desc" @if(session('option') == "votes desc") selected @endif>Most votes</option>
                <option value="title asc" @if(session('option') == "title asc") selected @endif>Titel: A - Z</option>
                <option value="title desc" @if(session('option') == "title desc") selected @endif>Titel: Z - A</option>
              </select>
            </div>
            <noscript><button type="submit">sorteer</button></noscript>
        </form>
      </div>
    </div>
    <a href="/posts/create"><button class="btn btn-default btn-block hoverable btn-create-post">Post aanmaken</button></a>

    <blockquote>
      Alle posts
    </blockquote>
    <div class="col s12 m12">
   
   
    @foreach($posts as $post)
    
    <a href="/posts/{{$post->id}}">
      <div class="row z-depth-2 hoverable post-main-wrapper">
        <div class="col s12 m1 hide-on-small-only	post-votes-wrapper">
          <div class="votes post-votes-number">{{ $post->votes }}</div>
              <div class="votes_caret post-votes-number">
                  @if(!$user->hasVoted($post))
                  <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                  <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                  @else
                      @if($user->hasUpVoted($post))
                          <object><a href="/posts/{{$post->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up" aria-hidden="true" ></i></a></object>
                          <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                      @endif
                      @if($user->hasDownVoted($post))
                          <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                          <object><a href="/posts/{{$post->id}}/cancelvote" class="downvote  cancelvote"><i class="fa fa-caret-down" aria-hidden="true" ></i></a></object>
                      @endif
                  @endif
              </div>
        </div>
        <div class="col s12 m2 hide-on-small-only	post-img-wrapper">
        @if($post->topic == "techniek")
          <img src="{{asset('img/icon_techniek.svg')}}" alt="" >  
        @elseif($post->topic == "sociaal")
          <img src="{{asset('img/icon_social.svg')}}" alt="">  

        @else
          <img src="{{asset('img/icon_sound.svg')}}" alt="">  

        @endif
        </div>
        <div class="col s10 m8">
          <div class="">
                  
                  <h5 class="">{{$post->title}}</h5>
                  <i class="truncate">{{$post->body}}</i>
                  
                  
                 
                  @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                  <small><b>Tags: </b>{{$post->tag1}} | {{$post->tag2}} | {{$post->tag3}}</small>
                  @else
                  <small><br></small>
                  @endif
                  <p><small><b>Geplaatst door:</b> {{$post->user->name}} van {{$post->user->jeugdhuis->name}}  </small></p>
                  @if(count($post->comments) === 1)
                  <p><small><b>{{count($post->comments)}} reactie </b> </small></p>
                  @else
                  <p><small><b>{{count($post->comments)}} reacties </b> </small></p>
                  @endif
          </div>
          <div class="col s12 m12">
          
          </div>
        </div>
        <div class="col s2 m1" >
          <!-- -->
          <div class="relative-pos">
            
          
          @if( count($post->favorites->where('user_id', auth()->id())) )

                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST" class="favorite">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star fa-2x" aria-hidden="true"></i>
                      </button>
                    </form>
                  @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST" class="favorite">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o fa-2x" aria-hidden="true"></i></button>
                    </form>

          @endif
          </div>
        </div>
      </div>
      </a>
      
    @endforeach
    {{ $posts->links() }}

    </div>
  </div>
</div>



@endsection