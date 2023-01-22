<?php

use App\Models\SiteSetting;

if (!function_exists("siteSetting")) {
    function siteSetting($value)
    {
        $sitesInfo = SiteSetting::first();
        return $sitesInfo->$value;
    }
}
