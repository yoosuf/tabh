<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Services\Auth\AuthProviderService;

class AuthProviderController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/search?type=pharmaceutical';

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
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->scopes(['public_profile', 'email'])->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @param $provider
     * @param AuthProviderService $service
     * @return callable URL from facebook
     */
    public function handleProviderCallback(Request $request, $provider, AuthProviderService $service)
    {
        $user = Socialite::driver($provider)->user();
        $auth = $service->createOrGetUser($provider, $user);
        auth()->login($auth);
        return redirect()->intended($this->redirectTo);
    }
}
