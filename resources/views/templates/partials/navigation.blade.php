<div class="navbar navbar-inverse navbar-fixed-left">

  <ul class="nav navbar-nav">
  <li><a class="navbar-brand" href="{{ route('home') }}" style="font-size:36px">Gallery</a></li>
              
                    <li>                
                      <form class="navbar-form navbar-left" role="search" action="{{route('search.resoults')}}">
                          <div class="form-group">
                              <input type="text" name="query" class="form-control" placeholder="Find people"><button type="submit" class="btn btn-primary">Search</button>
                          </div>
                      </form>
                    </li>
                    @if (Auth::check())
                    <li><a href="{{ route('home') }}"> Timeline</a></li>
                    <li><a href="{{ route('friends.index') }}">Friends</a></li>
                    <li><a href="{{ route('profile.index', ['username'=>Auth::user()->username]) }}">{{ Auth::user()->getNameOrUsername()}}</a></li>
                    <li><a href="{{ route('profile.edit') }}">Update profile</a></li>
                    <li><a href="{{ route('auth.signout') }}">Sing out</a></li>
                    @else
                    <li><a href="{{ route('auth.signup') }}">Sing up</a></li>
                    <li><a href="{{ route('auth.signin') }}">Sing in</a></li>

                   @endif
  </ul>
</div>
