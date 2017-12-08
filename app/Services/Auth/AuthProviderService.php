<?php

namespace App\Services\Auth;

use App\Entities\AuthProvider;
use App\Entities\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class AuthProviderService
{

    public function createOrGetUser($provider, ProviderUser $providerUser)
    {
        $account = AuthProvider::whereProviderName($provider)
            ->whereProviderId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new AuthProvider([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
                'avatar'    => $providerUser->getAvatar()
            ]);
            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'password' => '',
                    'avatar'    => $providerUser->getAvatar()
                ]);
            }
            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
