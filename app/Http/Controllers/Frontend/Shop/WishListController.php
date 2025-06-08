<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class WishListController extends Controller
{
    public function showwishlist()
    {
        $id = Auth::id();
        $wishlists = Wishlist::where('user_id', $id)->get();
        $ids = Wishlist::where('user_id', $id)->pluck('product_id')->toArray();
        $wishlists = Product::whereIn('id', $ids)->get();
        //dd($products);

        return view('Frontend.shop.wishlist.index', compact('wishlists'));
    }

    public function storewishlist($slug)
    {
        //dd($slug);

        $product = Product::where('slug', $slug)->first();
        //dd($product->image);
        $wishlist = new Wishlist();
        //$wishlist->image = $product->image;
        // $wishlist->product_title = $product->product_title;
        // $wishlist->sale_price = $product->sale_price;
        $wishlist->product_id = $product->id;
        $wishlist->user_id = Auth::id();
        $wishlist->save();

        toast('Product added to wishlist successfully!!', 'success');
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }
    public function destroy($wishlist)
    {
        $wishlist = Wishlist::where('product_id', $wishlist)->where('user_id', Auth::id())->first();
        //dd($wishlist);

        $wishlist->delete();
        toast('Product added to wishlist successfully!!', 'success');
        return redirect()->back()->with('success', 'Product added to wishlist successfully!');
    }
}
