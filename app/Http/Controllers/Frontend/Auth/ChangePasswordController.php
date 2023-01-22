<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.auth.password.change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldPassword, $hashedPassword)) {

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->update();
            Auth::logout();

            $notification = array(
                'message' => 'Password is change successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('login')->with($notification);
        }

        $notification = array(
            'message' => 'Current Password is Invalid',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
