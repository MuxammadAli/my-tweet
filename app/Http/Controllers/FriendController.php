<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();

        $requests = Auth::user()->friendRequests();

        return view('friends.index', [
            'friends' => $friends,
            'requests' => $requests 
        ]);
    }

    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();

        if(! $user){
            return redirect()->route('home')->with('info', 'Пользователь не найден !');
        }

        if( Auth::user()->id === $user->id){
            return redirect()->route('home');
        }

        if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user() ) ){
            return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'Запрос Отправлен');
        }

        if(Auth::user()->isFriendWith($user)){
            return redirect()->route('profile.index', ['username' => $user->username])->with('info', 'Уже в друзьях');
        }

        Auth::user()->addFriend($user);
              return redirect()->route('profile.index', ['username' => $username])->with('info', 'Запрос Отправлен в друзья');      
    }


    public function getAccept($username)
    {
        $user = User::where('username', $username)->first();

        if(! $user){
            return redirect()->route('home')->with('info', 'Не найдено');
        }

        if( ! Auth::user()->hasFriendRequestReceived($user)){
            return redirect()->route('home');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()->route('profile.index', ['username' => $username])->with('info', 'Запрос принят');
    }
}
