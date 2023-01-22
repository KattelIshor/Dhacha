<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $setting = Setting::first();
        return view('backend.settings.setting', compact('setting'));
    }

    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);

        $setting->vat = $request->vat;
        $setting->shipping_charge = $request->shipping_charge;
        $setting->update();

        $notification = array(
            'message' => 'Setting updated successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
