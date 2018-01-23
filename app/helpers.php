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

if (!function_exists('render_districts')) {
    function render_districts($district_id = null, $fieldName = null) {

        $listing = new \App\Utils\EPharma\Listing();
        $districts = $listing->districts();
//        dd($listing);
        $html = "<select name='$fieldName' id='$fieldName'>";

        if($district_id == null)
            $html .= "<option value='' selected>Select your district</option>";

        foreach ($districts['result'] as $district)
        {
            if($district->id == $district_id)
            {
                $html .= "<option value='". $district->id ."' selected>". $district->name ."</option>";

            }
            else if($district->id == 'BD')
            {
                $html .= "<option value='". $district->id ."' selected>". $district->name ."</option>";
            }
            else
            {
                $html .= "<option value='". $district->id ."'>". $district->name ."</option>";
            }
        }

        $html .= "</select>";

        return $html;

    }
}

if (!function_exists('render_areas')) {
    function render_areas($area_id = null, $fieldName = null, $district_id = null) {

        $listing = new \App\Utils\EPharma\Listing();
        $areas = $listing->areas($district_id);

        $html = "<select name='$fieldName' id='$fieldName'>";

        if($area_id == null)
            $html .= "<option value='' selected>Select your area</option>";

        foreach ($areas['result'] as $area)
        {
            if($area->id == $area_id)
            {
                $html .= "<option value='". $area->id ."' selected>". $area->name ."</option>";

            }
            else if($area->iso == 'BD')
            {
                $html .= "<option value='". $area->id ."' selected>". $area->name ."</option>";
            }
            else
            {
                $html .= "<option value='". $area->id ."'>". $area->name ."</option>";
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
