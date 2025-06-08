<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Couponuser;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
    public function getContact()
    {
        $id = Auth::id();
        $user = User::where('id', $id)->first();
        return view('Frontend.myAccount.offers.index', compact('user'));
    }
    public function saveContact(Request $request)
    {
        //dd($request);
        $user = Auth::user();
        $match = Coupon::where('coupon_code', $request->code)->where('availability', '>=', 1)->where('status', 1)->first();
        // dd($match);
        if ($match) {
            $comfirmuser = Couponuser::where('user_id', $user->id)->where('coupon_id', $match->id)->first();


            if (!$comfirmuser) {
                $matchuser = User::where('coupon', $match->coupon_code)->first();

                if (!$matchuser) {
                    $user->coupon = $request->code;
                    $user->save();

                    Alert::success('You have successfully redeemed your coupon code', '');
                    return redirect()->back();
                } else {
                    Alert::success('you have already Applied this coupon code', 'But not yet used');
                    return redirect()->back();
                }
            }
        }
        Alert::success('This coupon code is invalid or has expired.');
        return redirect()->back();
    }
    public function deleteContact($coupon)
    {
        $user = User::where('coupon', $coupon)->where('id', Auth::id())->first();

        //dd($user);
        $user->coupon = '';
        $user->save();
        return redirect()->back();
    }
}
