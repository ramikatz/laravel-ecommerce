<?php

namespace App\Http\Controllers\Dashboard\Shipping;

use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;

class ShippingChargeController extends Controller
{
    public function index()
    {
        $shippingcharges  = ShippingCharge::paginate(10);
        return view('Backend.shippingCharge.index', compact('shippingcharges'));
    }
    public function edit(ShippingCharge $shippingcharge)
    {
        // $shippingcharge = ShippingCharge::find($item)->first();
        return view('Backend.shippingCharge.edit', compact('shippingcharge'));
    }
    public function update(Request $request, ShippingCharge $shippingcharge)
    {
        //dd($shippingcharge);
        $shippingcharge->location = $request->location;
        $shippingcharge->charge = $request->charge;
        $shippingcharge->save();
        return redirect()->route('dashboard.shipping.index')
            ->with('message', 'product Deleted Successfully');
    }
    public function create()
    {
        return view('Backend.shippingCharge.create');
    }
    public function store(Request $request)
    {
        $shippingcharge = new ShippingCharge();
        $shippingcharge->location = $request->location;
        $shippingcharge->charge = $request->charge;
        $shippingcharge->save();
        return redirect()->route('dashboard.shipping.index')
            ->with('message', 'product Deleted Successfully');
    }
    public function destroy($shippingcharge)
    {
        $shippingcharge = ShippingCharge::find($shippingcharge)->first();

        //$product->productcategory()->detach();
        $shippingcharge->delete();

        return redirect()->route('dashboard.shipping.index')
            ->with('message', 'product Deleted Successfully');
    }
}
