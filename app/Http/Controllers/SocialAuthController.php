<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
      // return Socialite::driver('facebook')->redirect();
     return Socialite::with('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
       //$user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());
       $user = $service->createOrGetUser(Socialite::with('facebook')->user());
        auth()->login($user);

       return redirect()->to('/home');

          //$user = Socialite::with('facebook')->user();
    }
}
