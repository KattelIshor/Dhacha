<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\SiteSettingRepository;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public $siteSetting;

    public function __construct(SiteSettingRepository $siteSetting)
    {
        $this->middleware('auth:admin');
        $this->siteSetting = $siteSetting;
    }

    public function index()
    {
        $siteSetting = $this->siteSetting->index();
        return view('backend.settings.site', compact('siteSetting'));
    }

    public function update(Request $request, $id)
    {
        $siteSetting = $this->siteSetting->update($request, $id);

        $notification = array(
            'message' => 'Site setting updated successfully',
            'alert-type' => 'success',
        );

        return Redirect()->back()->with($notification);
    }
}
