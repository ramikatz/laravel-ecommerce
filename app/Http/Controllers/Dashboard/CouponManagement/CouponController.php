<?php

namespace App\Http\Controllers\Dashboard\CouponManagement;

use App\Models\Coupon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::get();
        return view('Backend.couponManagement.index', compact('coupons'));
    }

    public function update(Request $request, Coupon $coupon)
    {

        $coupon->name = $request->name;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->amount = $request->amount;
        $coupon->availability = $request->availability;
        $coupon->status = $request->status;
        $coupon->save();

        return redirect()->route('dashboard.coupon.index')
            ->with('success', 'coupon updated successfully');
    }
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->name = $request->name;
        $coupon->coupon_code = $request->coupon_code;
        $coupon->amount = $request->amount;
        $coupon->availability = $request->availability;
        $coupon->status = $request->status;
        $coupon->save();

        return redirect()->route('dashboard.coupon.index')
            ->with('success', 'coupon Created successfully');
    }
    public function create()
    {
        return view('Backend.couponManagement.create');
    }
    public function edit(Coupon $coupon)
    {
        return view('Backend.couponManagement.edit', compact('coupon'));
    }

    public function destroy($coupon)
    {

        $coupon = Coupon::find($coupon);
        if (Gate::denies('super-user')) {
            /* return redirect(route('dashboard.coupon.index'))
                ->with('danger', 'You have no permission to delete coupon'); */

            $coupon->delete();

            return redirect()->route('dashboard.coupon.index')
                ->with('success', 'coupon Deleted Successfully');
        }
    }
}
