<?php




if (!function_exists('getProfileAvatar')) {
    function getProfileAvatar() {

        $userId = auth()->user()->id;

        $user = \App\Entities\User::with('auth_provider')->find($userId);

        return $user->auth_provider->avatar;

    }
}

if (!function_exists('render_countries')) {
    function render_countries($iso = null, $fieldName = null) {

        $countries = \App\Entities\Country::all();

        $html = "<select name='$fieldName' id='$fieldName'>";

        if($iso == null)
            $html .= "<option value='' selected>Select your country</option>";

        foreach ($countries as $country)
        {
            if($country->iso == $iso)
            {
                $html .= "<option value='". $country->nice_name ."' selected>". $country->nice_name ."</option>";

            }
            else
            {
                $html .= "<option value='". $country->nice_name ."'>". $country->nice_name ."</option>";
            }
        }

        $html .= "</select>";

        return $html;

    }
}
