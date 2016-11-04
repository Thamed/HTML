@extends('templates.defaultWithBackground')

@section('content')
<div class="row">
    <div class="col-xs-4">
    </div>
            <div class="col-xs-4">
            <h2 style="color:white"><b>Sign in</b></h3>
                <form class="form-vertical"role="form" method="post" action="{{route('auth.signin')}}">
                    <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                                <input type="text" placeholder="E-mail" name="email" class="form-control" id="email">
                    @if($errors->has('email'))
                        <span class="help-block">{{ $errors->first('email') }} </span>
                    @endif
                    </div>
                    <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                        <input type="password" placeholder="Password" name="password" class="form-control" id="password">
                    @if($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }} </span>
                    @endif
                    </div>
                    <div style="color:white" class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember me
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                    <input type="hidden" name="_token" value="{{Session::token()}}">
                </form>
            </div>
    <div class="col-xs-4">  
    </div>
</div>
@stop