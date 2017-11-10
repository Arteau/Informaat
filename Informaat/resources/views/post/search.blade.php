@extends('layouts.landing')

@section('content')
<div class="container container-margin">
    <form role="search" class="app-search" action="/posts/search" method="POST">
        {{ csrf_field() }}
            <input type="text" name="keyword" id="keyword" placeholder="Zoeken" class="form-control width-100">
    </form>  
    @if (!empty($searchPost))
        @isset($searchPost)
        @empty($searchPost[0])
            <br>
            <h3 class="text-center">Whooops, geen resultaten gevonden!</h3>
        @endempty
        @endisset
        @foreach($searchPost as $post)    
        <a href="/posts/{{$post->id}}">
        <div class="row z-depth-2 hoverable post-main-wrapper">
          <div class="col s12 m1 hide-on-small-only	post-votes-wrapper">
           
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
            <div>            
                    <h5>{{$post->title}}</h5>
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
          
          </div>
        </div>
        </a>

        @endforeach
    @endif
</div>
@endsection