<?php


use Illuminate\Support\Facades\Storage;

if (!function_exists('getProfileAvatar')) {
    function getProfileAvatar() {

        $userId = auth()->user()->id;

        $user = \App\Entities\User::with('auth_provider')->find($userId);

        return $user->auth_provider->avatar;

    }
}

if (!function_exists('render_countries')) {
    function render_countries($nice_name = null, $fieldName = null) {

        $countries = \App\Entities\Country::all();

        $html = "<select name='$fieldName' id='$fieldName'>";

        if($nice_name == null)
            $html .= "<option value='' selected>Select your country</option>";

        foreach ($countries as $country)
        {
            if($country->nice_name == $nice_name)
            {
                $html .= "<option value='". $country->nice_name ."' selected>". $country->nice_name ."</option>";

            }
            else if($country->iso == 'BD')
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

if (!function_exists('get_attachment')) {

    function getAttachmentURL($attachment)
    {
        try {
            if (isset($attachment)) {
                return Storage::url($attachment->path);
            } else {
                //return  url('/images/placeholder/profile.png');
            }
        } catch (\Exception $exception) {
            //Log::notice($exception);
            //return  url('/images/placeholder/profile.png');
            return $exception;
        }
    }

    function get_attachment($attachment = null)
    {
        return str_replace("/storage/attachments/", "", getAttachmentURL($attachment));
    }
}
