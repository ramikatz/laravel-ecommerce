<?php

namespace App\Http\Controllers\Frontend\Shop;


use App\User;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Review;
use App\Models\Address;
use App\Models\Product;
use App\Models\Couponuser;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Models\ProductCategory;
use App\Models\ShippingAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Mail\MailController;

class CheckoutController extends Controller
{
    public function checkout()
    { //session
        if (Gate::denies('all-users')) {
            return redirect(route('login'))->with('message', 'You have no permission to delete users');
        }

        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        $user_id = Auth::id();
        $user = User::where('id', $user_id)->with('address', 'shippingaddress')->first();
        //dd($user);
        return view('Frontend.shop.checkout.index', compact('productcategories', 'user'));
    }

    public function store(Request $request)
    {
        //dd($request);
        $id = $request->product;
        $item = Product::find($id);

        //save Billing Address
        $order = new Order();
        $order->order_number = uniqid('SR-'); //generate order number ramdonmly
        $order->user_id = Auth::id();

        if ($request->grand_total) {
            $order->grand_total = $request->grand_total;
        } else {
            $order->grand_total = $item->sale_price;
        }

        $cartItems = Session::get('cart');
        if (!$request->actiontype) {
            $totalitem = 0;
            foreach ($cartItems as $item) {
                $totalitem += 1 * $item['quantity'];
            }
        }

        if (!$request->actiontype) {
            $order->item_count = $totalitem;
        } else {
            $order->item_count = 1;
        }

        if (request('payment_option') == 'paypal') {
            $order->payment_method = 'paypal';
        } elseif (request('payment_option') == 'cod') {
            $order->payment_method = 'cash_on_delivery';
        } elseif (request('payment_option') == 'card') {
            $order->payment_method = 'card';
        }
        $order->coupon_code = $request->coupon_code;
        $order->district = $request->district;
        $order->save();
        if ($order->coupon_code) {
            $match = Coupon::where('coupon_code', $request->coupon_code)->first();
            $couponuser = new Couponuser();
            $couponuser->user_id = Auth::id();
            $couponuser->coupon_id = $match->id;
            $couponuser->order_id = $order->id;
            $couponuser->save();

            $user = User::find(Auth::id());
            $user->coupon = '';
            $user->Fname = $request->billing_Fname;
            $user->Lname = $request->billing_Lname;
            $user->save();
            Coupon::where('id', $match->id)->decrement('availability', 1);
        }

        $user = User::find(Auth::id());
        $user->Fname = $request->billing_Fname;
        $user->Lname = $request->billing_Lname;
        $user->save();



        $user_id = Auth::id();
        $checkaddress = Address::where('user_id', $user_id)->first();

        if ($checkaddress) {
            $address = Address::where('user_id', $user_id)->first();
            $address->billing_Cname = $request->billing_Cname;
            $address->billing_address_line_1 = $request->billing_address_line_1;
            $address->billing_address_line_2 = $request->billing_address_line_2;
            $address->user_id = $user_id;
            $address->billing_city = $request->billing_city;
            $address->billing_state = $request->billing_state;
            $address->billing_postal_code = $request->billing_postal_code;
            $address->billing_mobile = $request->billing_mobile;
            $address->save();
        } else {
            $address = new Address();
            $address->billing_Cname = $request->billing_Cname;
            $address->billing_address_line_1 = $request->billing_address_line_1;
            $address->billing_address_line_2 = $request->billing_address_line_2;
            $address->billing_city = $request->billing_city;
            $address->user_id = $user_id;
            $address->billing_state = $request->billing_state;
            $address->billing_postal_code = $request->billing_postal_code;
            $address->billing_mobile = $request->billing_mobile;
            $address->save();
        }

        $user_id = Auth::id();
        $checkshippingAddres = ShippingAddress::where('user_id', $user_id)->first();

        if ($checkshippingAddres) {
            $shippingAddress = ShippingAddress::where('user_id', $user_id)->first();
            $shippingAddress->shipping_fullname = $request->shipping_Fname;
            $shippingAddress->shipping_Cname = $request->shipping_Cname;
            $shippingAddress->shipping_address1 = $request->shipping_address1;
            $shippingAddress->shipping_address2 = $request->shipping_address2;
            $shippingAddress->shipping_city = $request->shipping_city;
            $shippingAddress->user_id  = $user_id;
            $shippingAddress->shipping_state = $request->shipping_state;
            $shippingAddress->shipping_postal_code = $request->shipping_postal_code;
            $shippingAddress->shipping_mobile = $request->shipping_mobile;
            $shippingAddress->save();
        } else {
            $shippingAddress = new ShippingAddress();
            $shippingAddress->shipping_fullname = $request->shipping_Fname;
            $shippingAddress->shipping_Cname = $request->shipping_Cname;
            $shippingAddress->shipping_address1 = $request->shipping_address1;
            $shippingAddress->user_id  = $user_id;
            $shippingAddress->shipping_address2 = $request->shipping_address2;
            $shippingAddress->shipping_city = $request->shipping_city;
            $shippingAddress->shipping_state = $request->shipping_state;
            $shippingAddress->shipping_postal_code = $request->shipping_postal_code;
            $shippingAddress->shipping_mobile = $request->shipping_mobile;
            $shippingAddress->save();
        }

        /*         $cartItems = Session::get('cart');
        if (!$request->actiontype) {

            foreach ($cartItems as $item) {
                $review = new Review();
                $review->user_id  = Auth::id();
                $review->product_id  = $item['id'];
                $review->save();
            }
        } */

        if ($request->actiontype) {
            $id = $request->product;
            $item = Product::find($id);
            Product::where('id', $item->id)->decrement('quantity', 1);
            $order->order_items()->attach($item->id, ['price' => $item->sale_price, 'quantity' => 1]);
        } else {
            $cartItems = Session::get('cart');
            foreach ($cartItems as $item) {
                Product::where('id', $item['id'])->decrement('quantity', $item['quantity']);
                $order->order_items()->attach($item['id'], ['price' => $item['price'], 'quantity' => $item['quantity']]);
            }
            Session::forget('cart');
        }


        //Send Email
        $email = User::find($order->user_id);
        // MailController::SendOrderCompleteEmail($order->shipping_Fname, $email, $order->order_number, $order->grand_total);


        return redirect()->route('frontend.completed')
            ->with('success', 'Product Created successfully');
    }

    public function completed()
    {
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Frontend.shop.checkout.completed', compact('productcategories'));
    }
}
