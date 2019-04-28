<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $userSocial = Socialite::driver($provider)->stateless()->user();
        if ($userSocial->getEmail()) {
            $user = User::where(['email' => $userSocial->getEmail()])
                ->first();
        } else {
            return redirect(route('login'))
                ->withErrors(["email" => "Facebook Login given has no email address!"]);
        }
        if ($user) {
            Auth::login($user);
            return redirect(route('home'));
        } else {
            $user = User::create([
                'first_name' => $userSocial->getRaw()['first_name'],
                'last_name' => $userSocial->getRaw()['last_name'],
                'email' => $userSocial->getEmail(),
                'user_type' => User::USER_TYPE_NORMAL,
                'img_url' => $userSocial->getAvatar(),
            ]);
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route(route('home'));
        }
    }
}
