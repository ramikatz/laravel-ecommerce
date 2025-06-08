<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrackingController extends Controller
{
    public function show($id)
    {

        $item = Order::where('id', $id)->first();
        //dd($order);
        return view('Frontend.myAccount.tracking', compact('item'));
    }
}
