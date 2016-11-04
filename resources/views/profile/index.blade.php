@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-5">
           @include('user.partials.userblock')
           <hr>
        </div>
        <div class="col-lg-4 col-lg-offser-3">
        @if(Auth::user()->hasFriendRequestPending($user))
            <p>Waiting for {{$user->getNameOrUsername()}} to accept the friend request.</p>
        @elseif(Auth::user()->hasFriendRequestRecived($user))
            <a href="{{ route('friends.accept', ['username'=>$user->username]) }}" class="btn btn-primary">Accept</a>
        @elseif(Auth::user()->isFriendsWith($user))
            <p>You and {{$user->getNameOrUsername}} are friends.</p>
        @elseif (Auth::user()->id !== $user->id)
            <a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary"> Add as Friend</a>
        @endif
            <h4>{{$user->getNameOrUsername()}}'s friends.</h4>

            @if(!$user->friend()->count())
            <p>{{$user->getNameOrUsername()}} has no friends. </p>
            @else
                @foreach($user->friend() as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif
        </div>
    </div>
@stop