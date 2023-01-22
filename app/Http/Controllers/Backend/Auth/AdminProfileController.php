<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.auth.profile.index');
    }

    public function changePassword(AdminProfileRequest $request)
    {
        $admin = Admin::find(auth()->guard('admin')->user()->id);

        if (!Hash::check($request->current_password, $admin->password)) {
            $notification = array(
                'message' => 'Current password not match',
                'alert-type' => 'worning'
            );

            return redirect()->back()->with($notification);
        }

        $admin->password = Hash::make($request->password);
        $admin->update();

        Auth::logout();

        $notification = array(
            'message' => 'Password has been changed. please login again',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.login')->with($notification);
    }
}
