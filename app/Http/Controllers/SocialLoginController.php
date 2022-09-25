<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider()
    {
        return  Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        // create user
        // dd($githubUser);
        $user = User::firstOrCreate(['provider_id' => $githubUser->getId()], ['email' => $githubUser->getEmail(), 'name' => $githubUser->name ? $githubUser->name : $githubUser->nickname]);

        // login 
        auth()->login($user, true);
        return redirect()->route('student.dashboard');
    }
}
