@extends('layouts.app')

@section('content')


    <!-- /.container -->
<div class="container">
  
  <h2 class="header">Alle posts</h2>

  <div class="row">
  <div class="col m1"></div>
  @foreach($tops as $top)
    <div class="col s6 m2">
      <div class="card">
        <div class="card-image">
          <img src="https://maxcdn.icons8.com/Share/icon/color/Gaming//bullbasaur1600.png">
          <span class="card-title"></span>
        </div>
        <div class="card-content">
          <p class="truncate">{{$top->title}}</p>
        </div>
        <div class="card-action">
          <a href="/posts/{{$top->id}}">Lees meer</a>
        </div>
      </div>
    </div> 
    @endforeach
  </div>


  <div class="row">
    <div class="col m6 s12">
      <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}

          @include ('layouts.errors')
          <input type="text" name="keyword" id="keyword" placeholder="Zoeken" class="form-control" style="width:100%"> <a href=""></a>
      </form>
    </div>

  


    
 
    <div class="col m6 s12">
      <form role="sort" class="app-sort" id="sort-form" action="/posts/sort" method="POST">
          {{ csrf_field() }}
            <div class="form-group">
              <label for="keyword">Sorteer op</label>
              <select class="form-control"  name="sort" id="sort">
              
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
    <div class="col s12 m7">
  
    @foreach($posts as $post)
      <div class="card horizontal z-depth-2 hoverable">
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

                  <h2 class="card-title">{{$post->title}}</h2>
                  <i>{{$post->body}}</i>
                  <hr>
                  <a href="/posts/{{$post->id}}/edit"><button class="btn btn-default">edit post</button></a>
                  
                  <p>Onderwerp: {{$post->topic}}</p> 
                  @if(!empty($post->tag1 | $post->tag2 | $post->tag3))
                  <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
                  @endif
          </div>
          <div class="card-action">
            <a href="/posts/{{$post->id}}">Lees meer</a>
          </div>
        </div>
      </div>

    @endforeach
    <a href="/posts/create"><button class="btn btn-default">Create post</button></a>
</div>
  </div>
</div>



@endsection