
<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
    <a class="navbar-brand" href="/">Twitter</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @if (Auth::check())
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('home')}}">Home </a>
        </li>
        <li class="nav-item {{ Request::is('friends') ? 'active' : ''}}">
          <a class="nav-link" href="{{ route('friends.index')}}"> <i class="fas fa-user-friends"></i> Friends</a>
        </li>
          <form method="GET" action="{{ route('search.results') }}" class="form-inline my-2 ml-3 my-lg-0">
            <input name="query" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
          </form>
      </ul>
      @endif
      <ul class="navbar-nav ml-auto">
          @if (Auth::check())
          <li class="nav-item {{ Request::is('user/' . Auth::user()->username) ? 'active' : ''}}"><a href="{{ route('profile.index', ['username' => Auth::user()->username ])}}" class="nav-link">{{ Auth::user()->getNameOrUsername() }}</a></li>
          <li class="nav-item {{ Request::is('profile/edit') ? 'active' : ''}}"><a href="{{ route('profile.edit')}}" class="nav-link">Refresh profile</a></li>
          <li class="nav-item"><a href="{{ route('auth.signout') }}" class="nav-link">Logout</a></li>
          @else
          <li class="nav-item {{ Request::is('signup') ? 'active' : ''}}"><a href="{{ route('auth.signup') }}" class="nav-link">Register</a></li>
          <li class="nav-item {{ Request::is('signin') ? 'active' : ''}}"><a href="{{ route('auth.signin')}}" class="nav-link">Sign In</a></li>
          @endif
      </ul>
    </div>
    </div>
  </nav>