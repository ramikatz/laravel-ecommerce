<?php

namespace App\Http\Controllers\Dashboard\OrderManagement;

use App\User;
use App\Models\Order;
use App\Models\Address;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Mail\OrderMailController;
use App\Http\Controllers\Mail\DeliveryMailController;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('Backend.orderManagement.index', compact('orders'));
    }
    public function create()
    {
        $users = User::all();
        return view('Backend.orderManagement.create', compact('users'));
    }
    public function edit($order)
    {
        $order = Order::where('id', $order)->first();
        $orderItems = Order::with('order_items')->where('id', $order->id)->get();

        $user = User::where('id', $order->user_id)->with('shippingaddress', 'address')->first();

        $billing_address = Address::where('user_id', $order->user_id)->first();
        $shippingaddress = ShippingAddress::where('user_id', $order->user_id)->first();

        return view('Backend.orderManagement.edit', compact('order', 'orderItems', 'user', 'shippingaddress', 'billing_address'));
    }

    public function update(Request $request, Order $order)
    {
        if ($request->input('shipping_label')) {
            $customer = User::where('id', $order->user_id)->with('address')->first();
            $pdf = PDF::loadView('Backend.shippingLabel.index', ['data' => $customer]);
            return $pdf->stream('document.pdf');
        } elseif ($request->input('emailAction')) {
            $user = User::find($order->user_id);
            if ($request->emailAction) {
                if ($request->emailAction == 1) {
                    OrderMailController::SendOrderInvoice($user->email, $user->Fname, $order->order_number, $order->grand_total);
                } elseif ($request->emailAction == 2) {
                    OrderMailController::ResendSendOrderCompleteEmail($user->email, $user->Fname, $order->order_number, $order->grand_total);
                }
            }
            return redirect()->route('dashboard.order.index')
                ->with('success', 'Order Status has been Updated successfully');
        } elseif ($request->input('changestatus') and $request->status) {

            $order->status = $request->status;
            $order->save();
            $user = User::find($order->user_id);
            DeliveryMailController::SendTrackingMail($order->status, $user->email, $user->Fname, $order->order_number);
            return redirect()->route('dashboard.order.index')
                ->with('success', 'Order Status has been Updated successfully');
        }

        return redirect()->route('dashboard.order.index');
    }
    public function destroy($order)
    {

        $order = Order::where('id', $order)->first();

        $order->delete();

        return redirect()->route('dashboard.order.index')
            ->with('success', 'order Deleted Successfully');
    }
}
