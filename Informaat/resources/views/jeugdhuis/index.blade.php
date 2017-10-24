@extends('layouts.landing')

@section('content')



@if ($flash = session('message'))

    <script>
    $(function() {
      Materialize.toast('{{$flash}}', 4000);
    });
    </script>

@endif

<div class="container">
  <div class="row">
  
    <ul class="collapsible popout" data-collapsible="accordion" style="margin-top:50px">
    @foreach($jeugdhuizen as $jeugdhuis)
        <li>
          <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$jeugdhuis->name }}</div>
          <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
        </li>
    @endforeach
    </ul>
 

  </div>
</div>



@endsection