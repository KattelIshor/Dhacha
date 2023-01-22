<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsersRequest;
use App\Http\Requests\UsersLoginRequest;
use App\Models\User;
use App\Notifications\UserVerifyNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login_registration');
    }

    public function proccessLogin(UsersLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->email_verified_at == null) {

                Auth::logout();

                $notification = array(
                    'message' => 'Your account is not activated. Please check your mail',
                    'alert-type' => 'error',
                );
                return Redirect()->route('login')->with($notification);
            }

            $notification = array(
                'message' => 'You logged in.',
                'alert-type' => 'success',
            );

            return redirect()->intended();
        }

        $notification = array(
            'message' => 'Invalid credentials',
            'alert-type' => 'error',
        );

        return Redirect()->back()->with($notification);
    }

    public function showRegistrationForm()
    {
        return view('frontend.auth.login_registration');
    }

    public function proccessRegister(StoreUsersRequest $request)
    {
        $user = new User();

        $user->name = trim($request->name);
        $user->email = Str::lower(trim($request->email));
        $user->phone_number = $request->phone_number;
        $user->password = bcrypt($request->password);
        $user->email_verified_at = now();
        $user->email_verification_token = null;
        $user->save();

        // $user->notify(new UserVerifyNotification($user));

        $notification = array(
            'message' => 'Account registered',
            'alert-type' => 'success',
        );

        return Redirect()->route('login')->with($notification);
    }

    public function activate($token = null)
    {
        if ($token == null) {
            return redirect('/');
        }

        $user = User::where('email_verification_token', $token)->firstOrFail();

        if ($user) {
            $user->email_verified_at = now();
            $user->email_verification_token = null;
            $user->update();

            $notification = array(
                'message' => 'Account activated. You can login now.',
                'alert-type' => 'success',
            );

            return Redirect()->route('login')->with($notification);
        }

        $notification = array(
            'message' => 'Invalid token.',
            'alert-type' => 'success',
        );

        return Redirect()->route('login')->with($notification);
    }
}
