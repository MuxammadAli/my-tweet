@extends('templates.default')

@section('content')
    <div class="row">
        <div class="col-lg-6">
            @include('user.partials.userblock')
        </div>
        <div class="col-lg-4 col-lg-offset-3">
            @if (Auth::user()->hasFriendRequestPending($user))
            <p>В ожидании {{ $user->getFirstNameOrUsername() }}</p>
            @elseif (Auth::user()->hasFriendRequestReceived($user))
               <a href="{{ route('friends.accept', ['username' => $user->username])}}" class="btn btn-primary mb-2">Подтвердить</a> 
            @elseif(Auth::user()->isFriendWith($user))
               {{ $user->getFirstNameOrUsername() }} В друзьях
            @elseif( Auth::user()->id !== $user->id)
                <a href="{{ route('friends.add', ['username' => $user->username]) }}" class="btn btn-primary">Добавить в друзья</a>
            @endif
                <h4>{{ $user->getFirstNameOrUsername() }} друзья</h4>
            @if ( !$user->friends()->count() )
                <p>{{ $user->getFirstNameOrUsername() }}нет друзей</p>
            @else
                @foreach ($user->friends() as $user)
                    @include('user.partials.userblock')
                @endforeach
            @endif
        </div>
    </div>
@endsection