<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLogoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'User logged out.',
            'alert-type' => 'success',
        );

        return Redirect()->route('login')->with($notification);
    }
}
