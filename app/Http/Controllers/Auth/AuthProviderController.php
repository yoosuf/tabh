<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Services\Auth\AuthProviderService;

class AuthProviderController extends Controller
{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a redirect method to facebook api.
     *
     * @param $provider
     * @return
     */
    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @param $provider
     * @param AuthProviderService $service
     * @return callable URL from facebook
     */
    public function callback($provider, AuthProviderService $service)
    {

        $user = Socialite::driver($provider)->user();

//
//        $authUser = $this->findOrCreateUser($user, $provider);
//        Auth::login($authUser, true);
//        return redirect($this->redirectTo);


//        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
//        auth()->login($user);
//        return redirect()->to('/home');
    }
}
