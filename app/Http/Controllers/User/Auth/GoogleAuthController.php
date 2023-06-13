<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * OAuth認証先にリダイレクト(google)
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogle()
    {
        return Socialite::driver("google")->redirect();
    }

    /**
     * Google認証後の処理
     *
     * @return \Illuminate\Http\Response
     */
    public function googleCallback()
    {
        $google_user = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $google_user->email
        ], [
            'name' => $google_user->name,
            'country' => $google_user->user['locale'],
            'google_id' => $google_user->getId()
        ]);

        Auth::login($user, true);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
