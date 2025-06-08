<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Order_Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        if (Gate::denies('all-users')) {
            toast('First, You have to Login!', 'danger');
            return redirect(route('login'));
        }
        //dd($request);
        $userId = Auth::id();
        // dan inna userta orders thiynwd balwna
        $orders = Order::where('user_id', $userId)->with('order_items')->pluck('id');
        // e orders walin thiyna product blnn
        $products = Order_Item::whereIn('order_id', $orders)->pluck('product_id');
        //dd($products);
        $product = Order_Item::whereIn('product_id', $products)->first();
        // dd($product);

        if (!$product) {
            Alert::success('You cannot review a product without buying it.', 'Success Message');
            return redirect()->back();
        } elseif ($product->product_id == $request->product_id) {
            $review = new Review();
            $review->review_des = $request->review_des;
            $review->rating = $request->rating;
            $review->title = $request->review_title;
            $review->user_id  = Auth::id();
            $review->product_id  = $request->product_id;
            $review->save();
            Alert::success('You have successfully added a review to this product.', 'Success Message');
            return redirect()->back();
        }
    }
}
