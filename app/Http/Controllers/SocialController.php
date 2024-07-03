<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function Callback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $users = User::where(['email' => $userSocial->getEmail()])->first();

        if ($users) {

            $user = User::where('provider_id', $userSocial->id)->first();
            // dd($user->user_type);

            if (empty($user->user_type)) {
                return view('user-type');

            } else {
                Auth::login($users);
                return redirect('/');

            }

        } else {

            $user = User::create([
                'fullname' => $userSocial->getName(),
                'name' => $userSocial->getName(),
                'username' => $userSocial->getName() . rand(10, 100. . '2024'),
                'email' => $userSocial->getEmail(),
                'photo' => $userSocial->getAvatar(),
                'provider_id' => $userSocial->getId(),
                'provider' => $provider,
                'is_activated' => 1,
            ]);
            Session::put('provider_id', $userSocial->id);
            if (empty($userSocial->user_type)) {
                return view('user-type');

            } else {
                return redirect('/');

            }

        }

    }
    public function userTypeAdd(Request $request)
    {
        // dd($userSocial->user_type);

        $getProvider_id = session()->get('provider_id');

        $user = User::where('provider_id', $getProvider_id)->first();

        if ($request->has('user_type')) {
            $user->user_type = $request->user_type;
        }
        if ($request->has('client_type')) {
            $user->client_type = $request->client_type;
        }

        $user->save();
        Auth::login($user);
        return redirect('/');

    }

}
