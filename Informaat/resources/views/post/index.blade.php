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

          @foreach($posts as $post)
          <!-- Blog Post -->
          <div class="blog_post md-4" style="padding: 5px;
                    background-color: #d2d1d1;margin-bottom:5px">
            <div class="card ">
                <div class="card-body">
                <h2 class="card-title">{{$post->title}}</h2>
                <a href="/posts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
                </div>
            </div>
          </div>
          @endforeach

         
          <!-- Pagination -->
          <ul class="pagination justify-content-center md-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

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