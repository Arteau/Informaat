@extends('layouts.app')

@section('content')

<style>
    .card-img-top {
        width:100% !important;
    }
    body {
    padding-top: 54px;
}

@media (min-width: 992px) {
    body {
        padding-top: 56px;
    }
}
</style>
<!-- Page Content -->
<div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="md-4">Alle posts
            <small>Informaat</small>
          </h1>
          <form role="search" class="app-search" action="/posts/search" method="POST">
          {{ csrf_field() }}

            @include ('layouts.errors')
            <input type="text" name="keyword" id="keyword" placeholder="Zoeken" class="form-control" style="width:100%"> <a href=""><i class="fa fa-search"></i></a>
        </form>


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
          @foreach($posts as $post)
      
          <!-- Blog Post -->
          <div class="blog_post md-4 alert alert-info">
            <div class="card ">
                <div class="card-body">
                
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
                <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
                <a href="/posts/{{$post->id}}/edit"><button class="btn btn-default">edit post</button></a>
                </div>
                <p>Onderwerp: {{$post->topic}}</p> 
                <small>{{$post->tag1}} // {{$post->tag2}} // {{$post->tag3}}</small>
            </div>
          </div>
          @endforeach
          
          <a href="/posts/create"><button class="btn btn-default">Create post</button></a>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <div class="card md-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>

          <!-- Categories Widget -->
          <div class="card md-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                    <li>
                      <a href="#">HTML</a>
                    </li>
                    <li>
                      <a href="#">Freebies</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->
          <div class="card md-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
              You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
          </div>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->



@endsection