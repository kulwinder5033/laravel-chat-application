<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function googlelogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();
            if (!$user) {
                // If user does not exist, create a new user
                $user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'password' => Hash::make('password'),
                ]);
                Auth::login($user, true);
                return redirect()->route('home')->with('success', 'Logged in successfully with Google!');
            }else{
                Auth::login($user, true);
                return redirect()->route('home')->with('success', 'Logged in successfully with Google!');
            }
            
        } catch (\Exception $e) {
            return redirect()->route('index')->with('error', 'Failed to login with Google: ' . $e->getMessage());
        }
    }
}
