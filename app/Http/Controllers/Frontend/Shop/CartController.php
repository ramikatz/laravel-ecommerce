<?php

namespace App\Http\Controllers\Frontend\Shop;

use session;
use App\Http\Requests;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function store($slug)
    {
        dd($slug);
    }

    public function cart()

    {

        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('frontend.shop.shopping-cart', compact('productcategories'));
    }
    public function update(Request $request, Product $product)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect(route('fetching'));
        }
    }

    public function checkout()
    {

        $cart = session()->get('cart');
        return view('frontend.shop.checkout', compact('cart'));
    }
    public function updatecart(Request $request, Product $product)

    {
        if ($request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            toast('Cart Updated successfully!', 'success');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
    public function deletecart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            toast('Cart Updated successfully!', 'success');
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
}
