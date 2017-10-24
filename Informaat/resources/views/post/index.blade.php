@extends('layouts.landing')

@section('content')
    <!-- /.container -->
<div class="container">

  
  <h2 class="header">Alle posts</h2>

  <div class="row">
 
  @foreach($tops as $top)
  <a href="/posts/{{$top->id}}">
    <div class="col s6 m3">
      <div class="card hoverable">
        <div class="card-image valign-wrapper ">
          <img src="{{asset('img/icon_sound.svg')}}" alt="">          
          <span class="card-title"></span>
        </div>
        <div class="card-content">
        <i class="material-icons" style="color:#ffe400">mood</i>{{ $top->votes }}<b><p class="truncate center-align">{{$top->title}}</p></b>
        </div>
        <div class="card-action center-align">
          Lees meer
        </div>
      </div>
    </div> 
  </a>
    @endforeach
  </div>


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
    <div class="col s12 m12">
  
    @foreach($posts as $post)
      <div class="row z-depth-2 hoverable">
        <div class="col s12 m1" style="position:relative">
          <div style="position:absolute" class="votes">{{ $post->votes }}</div>
              <div style="position:absolute" class="votes_caret">
                  @if(!$user->hasVoted($post))
                  <a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                  <a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                  @else
                      @if($user->hasUpVoted($post))
                          <a href="/posts/{{$post->id}}/cancelvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true" style="color:black"></i></a>
                          <a href="/posts/{{$post->id}}/downvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                      @endif
                      @if($user->hasDownVoted($post))
                          <a href="/posts/{{$post->id}}/upvote" class="upvote"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                          <a href="/posts/{{$post->id}}/cancelvote" class="downvote"><i class="fa fa-caret-down" aria-hidden="true" style="color:black"></i></a>
                      @endif
                  @endif
              </div>
        </div>
        <div class="col s12 m2" style="">
        <i class="large material-icons">monetization_on</i>

          <!-- <img src="https://maxcdn.icons8.com/Share/icon/color/Gaming//pokecoin1600.png" style="width:60%"> -->
        </div>
        <div class="col s10 m8">
          <div class="">
                  
                  <h5 class="">{{$post->title}}</h5>
                  <i class="truncate">{{$post->body}}</i>
                  
                  
                  <p>Onderwerp: {{$post->topic}}</p> 
                  @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                  <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
                  @endif
          </div>
          <div class="col s12 m12">
            <a href="/posts/{{$post->id}}">Lees meer</a>
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

    @endforeach
    {{ $posts->links() }}
    <a href="/posts/create"><button class="btn btn-default">Create post</button></a>
</div>
  </div>
</div>



@endsection