@extends('layouts.app')

@section('content')

@foreach($jeugdhuizen as $jeugdhuis)

@if ($flash = session('message'))

    <script>
    $(function() {
      Materialize.toast('{{$flash}}', 4000);
    });
    </script>

@endif


<div class="row">
      <div class="col s12 m5">
        <div class="card-panel teal">
          <span class="white-text"> 
          {{$jeugdhuis->name }}
          <hr>
          {{$jeugdhuis->zipcode}} {{$jeugdhuis->village}}
          <br>
          <div class="card-action">
          <a href="/jeugdhuizen/{{$jeugdhuis->id}}/edit"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
          </span>
        </div>
      </div>
    </div>

    

@endforeach

@endsection