<?php

namespace App\Services\Auth;

use App\Entities\AuthProvider;
use App\Entities\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class AuthProviderService
{


    public function findUser(ProviderUser $providerUser)
    {

    }




    public function findOrCreateUser(ProviderUser $providerUser)
    {


    }



    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = AuthProvider::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {
            $account = new AuthProvider([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => md5(rand(1, 10000)),
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
