<?php

namespace App\Http\Controllers\Dashboard\DeliveryManagement;

use App\User;
use App\Models\Order;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Mail\DeliveryMailController;
use App\Models\ShippingAddress;

class DeliveryControl extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '!=', 'Order Pending')->with('owneruser')->get();
        //dd($orders);
        return view('Backend.deliveryManagement.index', compact('orders'));
    }
    public function edit($order)
    {
        $orderModel = Order::find($order);

        $deliveryItem = Order::where('id', $order)->first();
        $Deliveryperson = User::find($deliveryItem->deliveryperson_id);
        $billing_address = Address::where('user_id', $orderModel->user_id)->first();
        //dd($billing_address);
        $shippingaddress = ShippingAddress::where('user_id', $orderModel->user_id)->first();
        // dd($shippingaddress);
        $UserDetail = User::where('id', $orderModel->user_id)->first();

        return view('Backend.deliveryManagement.edit', compact('shippingaddress', 'deliveryItem', 'Deliveryperson', 'billing_address', 'UserDetail'));
    }
    public function update(Request $request, $order)
    {

        $order = Order::where('id', $order)->first();
        // $user = User::find($order->user_id);
        // if (empty($order->deliveryperson_id)) {
        if ($order->deliveryperson_id == "Null") {
            $id = Auth::user()->id;
            //dd($id);
            $order->status = $request->status;
            $order->deliveryperson_id = $id;
            $order->save();

            // Send Mail
            //DeliveryMailController::SendTrackingMail($order->status, $user->email, $user->Fname, $order->order_number);

            return redirect()->route('dashboard.delivery.index')
                ->with('success', 'This Order Has Been Assigned to you');
        } else {
            return redirect()->route('dashboard.delivery.index')
                ->with('success', 'This Delivery Haddle By Another Member');
        }
    }
}
