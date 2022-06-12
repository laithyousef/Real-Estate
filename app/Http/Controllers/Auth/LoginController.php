<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     // Google Login
     public function redirectToGoogle()
     {
         return Socialite::driver('google')->redirect();
     }
 
     public function handleGoogleCallback()
     {
         $user = Socialite::driver('google')->user();
         $this->_registerOrLoginUser($user);
         return redirect()->route('pages.welcome');
     }
 
     // Facebook Login
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }
 
     public function handleFacebookCallback()
     {
         $user = Socialite::driver('facebook')->user();
         $this->_registerOrLoginUser($user);
         return redirect()->route('pages.welcome');
     }


     protected function _registerOrLoginUser($data)
     {
         $user = User::where('email' , '=' , $data->email)->first();

         if(!$user) {
             $user = new User();
             $uuid = Str::uuid()->toString();
             $user->name = $data->name;
             $user->email = $data->email;
             $user->password = Hash::make($uuid.now());
             $user->provider_id = $data->id;
             $user->avatar = $data->avatar;
             $user->save();
         }

         Auth::login($user);
     }


}
