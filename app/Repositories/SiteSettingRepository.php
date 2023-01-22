<?php

namespace App\Repositories;

use App\Models\SiteSetting;

class SiteSettingRepository
{
    public function index()
    {
        return SiteSetting::first();
    }

    public function update($request, $id)
    {
        $siteSetting = SiteSetting::find($id);

        $siteSetting->phone = $request->phone;
        $siteSetting->email = $request->email;
        $siteSetting->company_name = $request->company_name;
        $siteSetting->company_address = $request->company_address;
        $siteSetting->facebook = $request->facebook;
        $siteSetting->youtube = $request->youtube;
        $siteSetting->instagram = $request->instagram;
        $siteSetting->pinterest = $request->pinterest;
        $siteSetting->update();
    }
}
