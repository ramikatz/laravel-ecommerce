<?php

namespace App\Http\Controllers\Frontend\Shipping;

use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class ShippingController extends Controller
{
    public function store(Request $request)
    {
        // dd($request);
        $shippingchargeupdated = ShippingCharge::find($request->location);

        toast('Shipping Price Updated Sucssfully!', 'success');

        return Redirect::route('frontend.checkout', ['shippingchargeupdated' => ($shippingchargeupdated->charge)]);
    }
}
