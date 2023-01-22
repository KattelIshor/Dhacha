<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        if(Auth::guard('admin')->check()) {
            return redirect()->route('dashboard');
        }

        return view('backend.auth.login');
    }

    public function proccessLogin(AdminLoginRequest $request)
    {
        $credentials = request()->only(['email', 'password']);

        if (Auth::guard('admin')->attempt($credentials, $request->remember)) {

            $notification = array(
                'message' => 'You are logged in successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('dashboard')->with($notification);
        }

        $notification = array(
            'message' => 'These credentials do not match our records.',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
}
