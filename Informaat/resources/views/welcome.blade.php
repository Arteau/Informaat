@extends('layouts.app')

@section('content')


<div class="blue-grey lighten-4 landing_page">

    <div class="row">
        <div class="col s12 blue-grey lighten-1">
            <h1 class="center-align flow-text black-text">Welkom bij informaat</h1> 
        </div>
    </div>
    <div class="row">
    <div class="col m8 offset-m2 s12">
        <form role="search" class="app-search" action="/posts/search" method="POST">
            {{ csrf_field() }}

            @include ('layouts.errors')
            <label for="keyword">Zoeken</label>
            <input type="text" name="keyword" id="keyword"  class="field-input" style="width:100%"> <a href=""></a>
        </form>
    </div>

<div class="row">

      <div class="col s4">
        <!-- Promo Content 1 goes here -->
        PAGE1
      </div>
      <div class="col s4">
        <!-- Promo Content 2 goes here -->
        PAGE2
      </div>
      <div class="col s4">
        <!-- Promo Content 3 goes here -->
        PAGE3
      </div>

    </div>
  
</div>

 


@endsection