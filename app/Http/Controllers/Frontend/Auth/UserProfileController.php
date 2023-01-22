<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\UserProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    protected $profile;

    public function __construct(UserProfileRepository $profile)
    {
        $this->middleware('auth');
        $this->profile = $profile;
    }

    public function index($slug)
    {
        return view('frontend.auth.user_profile');
    }

    public function profileOrder($slug)
    {
        $orders = $this->profile->profileOrder($slug);
        return view('frontend.auth.order', compact('orders'));
    }

    public function track(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'order_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $track = $this->profile->track($request);

        if ($track) {
            return view('frontend.auth.track', compact('track'));
        } else {
            $notification = array(
                'message' => 'Code Invalid',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function returnProduct($slug)
    {
        $orders = $this->profile->returnProduct($slug);
        return view('frontend.auth.return_order', compact('orders'));
    }

    public function returnRequest($id)
    {
        $this->profile->returnRequest($id);

        $notification = array(
            'message' => 'Your product return request is pandding, Thank you!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
