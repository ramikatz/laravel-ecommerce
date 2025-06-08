<?php

namespace App\Http\Controllers\Frontend\PagesManagement;

use App\Http\Controllers\Controller;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function privacy()
    {
        return view('Frontend.pages.privacy-policy');
    }
    public function aboutUs()
    {
        return view('Frontend.pages.about_us');
    }
    public function faq()
    {
        return view('Frontend.pages.faq');
    }

    public function tof()
    {
        return view('Frontend.pages.tof');
    }
    public function refund()
    {
        return view('Frontend.pages.refund_policy');
    }
    public function location()
    {
        $shippingcharge = ShippingCharge::get();
        return view('Frontend.pages.location', compact('shippingcharge'));
    }
}
