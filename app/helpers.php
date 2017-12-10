<?php




if (!function_exists('getProfileAvatar')) {
    function getProfileAvatar() {

        $userId = auth()->user()->id;

        $user = \App\Entities\User::with('auth_provider')->find($userId);

        return $user->auth_provider->avatar;

    }
}




