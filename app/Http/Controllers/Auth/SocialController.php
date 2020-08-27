<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserEvent;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function loginVK()
    {
        return Socialite::driver('vkontakte')->redirect();
    }

    public function callbackVK()
    {
        $user = Socialite::driver('vkontakte')->user();
        $email   = $user->getEmail();
        $name    = $user->getName();
        $avatar  = $user->getAvatar();

        $objUser = new User();
        $user = $objUser->createOrUpdateUserWithSocialite([
            'email'  => $email,
            'name'   => $name,
            'avatar' => $avatar
        ]);

        if($user) {
            event(new UserEvent($user));
        }

        return redirect('/account');
    }

    public function loginFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFB()
    {
        $user = Socialite::driver('facebook')->user();
        $email   = $user->getEmail();
        $name    = $user->getName();
        $avatar  = $user->getAvatar();

        $objUser = new User();
        $user = $objUser->createOrUpdateUserWithSocialite([
            'email'  => $email,
            'name'   => $name,
            'avatar' => $avatar
        ]);

        if($user) {
            event(new UserEvent($user));
        }

        return redirect('/account');
    }
}
