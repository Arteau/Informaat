@extends('layouts.landing')

@section('content')
<div class="container" style="margin-top:50px" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h5>Registreer jeugdhuis</h5>
            <div class="panel panel-default">

                <div class="panel-body">
                    <form  method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="name">Name</label> 
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                        </div>

                        <div class="input-field">
                           
                            
                                <select id="jeugdhuis_id" type="text" class="input-field" name="jeugdhuis_id">
                                        <option value="0">Formaat</option>   
                                    @foreach($jeugdhuizen as $jeugdhuis) 
                                        <option value="{{$jeugdhuis->id}}">{{$jeugdhuis->name}}</option>
                                    @endforeach
                                </select>

                            
                        </div>

                        <div class="input-field">
                            <label for="email" >E-Mail Address</label>

                           
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                
                            
                        </div>

                        <div class="input-field">
                            <label for="password">Password</label>

                            
                                <input id="password" type="password" class="form-control" name="password" required>

                                
                        </div>

                        <div class="input-field">
                            <label for="password-confirm">Confirm Password</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
