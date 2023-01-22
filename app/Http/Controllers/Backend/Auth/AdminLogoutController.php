<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function proccessLogout()
    {
        Auth::logout();

        $notification = array(
            'message' => 'You are logged out in successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.login')->with($notification);
    }
}
