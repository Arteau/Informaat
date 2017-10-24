@extends('layouts.landing')

@section('content')
    <!-- /.container -->
<div class="container" style="margin-top:50px; margin-bottom:50px;">

  
<blockquote>
  Top posts deze week
</blockquote>

  <div class="row">
 
  @foreach($tops as $top)
  <a href="/posts/{{$top->id}}">
    <div class="col s6 m3" class="top">
      <div class="card hoverable">
        <div class="card-image valign-wrapper" style="padding:20px; padding-bottom:0;background-color:#f79727">
          @if($top->topic == "techniek")
            <img src="{{asset('img/icon_techniek_white.svg')}}" alt="" style="max-height:80px; left: 50%;transform: translateX(-50%);"> 
          @elseif($top->topic == "sociaal")
            <img src="{{asset('img/icon_social_white.svg')}}" alt="" style="max-height:80px; left: 50%;transform: translateX(-50%);"> 
          @else
            <img src="{{asset('img/icon_sound_white.svg')}}" alt="" style="max-height:80px; left: 50%;transform: translateX(-50%);"> 
          @endif
          <span class="card-title"></span>
        </div>
        <div class="card-content" style="background-color:#f79727">
        <span style="position: absolute;top: 2px;color: black;left: 3px;">
          <i class="material-icons" style="color:rgba(246, 248, 251, 0.83); font-size:17px">thumb_up</i>
          <span style="top: -3px;left: 21px;position: absolute; color:rgba(246, 248, 251, 0.83)">{{ $top->votes }}</span>
        </span> 
        <b><p class="truncate center-align white-text">{{$top->title}}</p></b>
         
        </div>
        <div class="card-action center-align black-text">
          Lees meer
        </div>
      </div>
    </div> 
  </a>
  @endforeach
  </div>

 <hr>
  <div class="row">
    <div class="col m6 s12">
      <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}

          @include ('layouts.errors')
          <label for="keyword">Zoeken</label>
          <input type="text" name="keyword" id="keyword"  class="field-input" style="width:100%"> <a href=""></a>
      </form>
    </div>

    <div class="col m6 s12">
      <form role="sort" class="app-sort" id="sort-form" action="/posts/sort" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="keyword">Sorteer op</label>
              <select class="field-input"  name="sort" id="sort">
                <option value="votes desc" @if(session('option') == "votes desc") selected @endif>Most votes</option>
                <option value="title asc" @if(session('option') == "title asc") selected @endif>Titel: A - Z</option>
                <option value="title desc" @if(session('option') == "title desc") selected @endif>Titel: Z - A</option>
                <option value="created_at desc" @if(session('option') == "created_at desc") selected @endif>Jongste eerst</option>
                <option value="created_at asc" @if(session('option') == "created_at asc") selected @endif>Oudste eerst</option>
              </select>
            </div>
            <noscript><button type="submit">sort</button></noscript>
        </form>
      </div>
    </div>
    <blockquote>
      Alle posts
    </blockquote>
    <div class="col s12 m12">
  
    @foreach($posts as $post)
    <a href="/posts/{{$post->id}}">
      <div class="row z-depth-2 hoverable" style="color:#636b6f">
        <div class="col s12 m1 hide-on-small-only	" style="position:relative">
          <div style="position:absolute" class="votes">{{ $post->votes }}</div>
              <div style="position:absolute" class="votes_caret">
                  @if(!$user->hasVoted($post))
                  <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                  <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                  @else
                      @if($user->hasUpVoted($post))
                          <object><a href="/posts/{{$post->id}}/cancelvote" class="upvote cancelvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a></object>
                          <object><a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a></object>
                      @endif
                      @if($user->hasDownVoted($post))
                          <object><a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a></object>
                          <object><a href="/posts/{{$post->id}}/cancelvote" class="downvote  cancelvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a></object>
                      @endif
                  @endif
              </div>
        </div>
        <div class="col s12 m2 hide-on-small-only	" style="position:relative">
        @if($post->topic == "techniek")
          <img src="{{asset('img/icon_techniek.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  
        @elseif($post->topic == "sociaal")
        <img src="{{asset('img/icon_social.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  

        @else
        <img src="{{asset('img/icon_sound.svg')}}" alt="" style="max-height:100px;position: absolute;left: 50%;transform: translateX(-50%);top: 10px;">  

        @endif
        </div>
        <div class="col s10 m8">
          <div class="">
                  
                  <h5 class="">{{$post->title}}</h5>
                  <i class="truncate">{{$post->body}}</i>
                  
                  
                  <p>Onderwerp: {{$post->topic}}</p> 
                  @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                  <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
                  @else
                  <small><br></small>
                  @endif
          </div>
          <div class="col s12 m12">
          
          </div>
        </div>
        <div class="col s2 m1" >
          <!-- -->
          <div style="position:relative">
            
          
          @if( count($post->favorites->where('user_id', auth()->id())) )

                    <form action="/posts/{{ $post->id }}/unfavorite" method="POST" class="favorite">
                      {{ csrf_field() }}
                      {{ method_field('PATCH') }}
                      
                      <button type="submit" class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                      </button>
                    </form>
                  @else
                
                    <form action="/posts/{{ $post->id }}/favorite" method="POST" class="favorite">
                      {{ csrf_field() }}
                      
                      <button type="submit" class="star"><i class="fa fa-star-o" aria-hidden="true"></i></button>
                    </form>

          @endif
          </div>
        </div>
      </div>
      </a>
    @endforeach
    {{ $posts->links() }}
    <a href="/posts/create"><button class="btn btn-default">Create post</button></a>
</div>
  </div>
</div>



@endsection