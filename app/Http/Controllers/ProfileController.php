<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller{
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();

        if(!$user){
            abort(404);
        }
        return view('profile.index', compact('user'));
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    public function postEdit(Request $request)
    {
        $this->validate($request,[

            'first_name' => 'alpha|max:50',
            'lastname' => 'alpha|max:50',
            'location' => 'alpha|max:20',
        ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'lastname' => $request->input('lastname'),
            'location' => $request->input('location'),
        ]);
        
        return redirect()->route('profile.edit')->with('info', 'Профиль успешно обновлён');
    }
}