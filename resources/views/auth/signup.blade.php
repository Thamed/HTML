@extends('templates.defaultWithBackground')

@section('content')

    <div class="row">
    <div class="col-xs-4">
    </div>

        <div   class="col-xs-4">
        <h2 style="color:white"><b>Sign up</b></h2>
            <form class="form-vertical" role="form" method="post" action="{{route('auth.signup')}}">
                <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                        <input type="text" placeholder="E-mail" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: ''}}">
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }} </span>
                @endif
                </div>

                <div class="form-group {{$errors->has('username') ? 'has-error': ''}}">
                    <input type="text" placeholder="Username" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: ''}}">
            @if($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }} </span>
                @endif
                </div>
                <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                    <input type="password" name="password" placeholder="Password" class="form-control" id="password" value="">
                    @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }} </span>
                @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Sign up</button>
                </div>
                <input type="hidden" name="_token" value="{{Session::token()}}">
            </form>
        </div>

    <div class="col-xs-4">
    </div>
</div>
@stop