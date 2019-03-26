<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class NaverAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::with('naver')->redirect();
    }
    
    public function handleProviderCallback()
    {
        $user = Socialite::with('naver')->user();
        $userToLogin = User::where([
            'provider' => 'naver',
            'socialId' => $user->getId(),
        ])->first();
        if(! $userToLogin){
            $userToLogin = User::create([
                'userType' => '2',
                'provider' => 'naver',
                'socialId' => $user->getId(),
                'nickName' => $user->getNickname(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'token' => $user->token,
            ]);
        }
        \Auth::login($userToLogin);
        return redirect('/');
    }
    
    public function destroy(){
        Auth::logout();
        return redirect()->intended('/')->with('alert', '로그아웃 되었습니다.');
    }
}
