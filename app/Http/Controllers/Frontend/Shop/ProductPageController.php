<?php

namespace App\Http\Controllers\Frontend\shop;

use App\User;
use App\Models\Review;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Models\ShippingCharge;
use App\Models\ProductCategory;
use App\Models\product_category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class ProductPageController extends Controller
{
    public function showproduct($slug)
    {
        //dd($slug);
        //Session::flush();
        //session()->forget('cart');
        //session()->forget('shipingchrge');
        $user_id = Auth::id();
        $checkproduct = Product::where('slug', $slug)->first();
        $reviews = Review::where('product_id', $checkproduct->id)->paginate(5);
        // dd($reviews);
        $checkproduct = Product::where('slug', $slug)->first();
        $checkreviews = Review::where('product_id', $checkproduct->id)->first();

        if ($checkreviews) {

            $reviewTotal = Review::count();
            $reviiew5 = Review::where('rating', 100)->count();
            $reviiew4 = Review::where('rating', 80)->count();
            $reviiew3 = Review::where('rating', 60)->count();
            $reviiew2 = Review::where('rating', 40)->count();
            $reviiew1 = Review::where('rating', 20)->count();

            $percent5 = $reviiew5 / $reviewTotal * 100;
            $percent4 = $reviiew4 / $reviewTotal * 100;
            $percent3 = $reviiew3 / $reviewTotal * 100;
            $percent2 = $reviiew2 / $reviewTotal * 100;
            $percent1 = $reviiew1 / $reviewTotal * 100;
        } else {
            $percent5 = 0;
            $percent4 = 0;
            $percent3 = 0;
            $percent2 = 0;
            $percent1 = 0;
        }


        $id = Auth::id();
        $Newarrivals = Product::latest()->get();
        $product = Product::where('slug', $slug)->with('productimages')->first();
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory', 'products')->get();
        // dd($productcategories);
        /*        $product_category  = product_category::where('category_id', $checkproduct->id)->pluck('id');
        $productcategory = ProductCategory::whereIn('id', $product_category)->get();
        dd($productcategory); */
        return view('Frontend.shop.product.index', compact('Newarrivals', 'productcategories', 'product', 'reviews', 'percent5', 'percent4', 'percent3', 'percent2', 'percent1'));
    }

    public function store(Request $request)
    {
        //dd($request);
        if (Gate::denies('all-users')) {
            toast('First, You have to Login!', 'danger');
            return redirect(route('login'));
        }

        /*    if ($request->input('buy')) {
            $product = Product::where('id', $request->product_id)->first();
            if ($request->quantity <= $product->quantity) {
                dd('ok');
            }
            dd('No');
        }
        dd('mm'); */

        //dd($request->slug);
        $quantity = $request->quantity;
        if ($request->product_id) {
            $product = Product::where('id', $request->product_id)->with('productimages')->first();
        }
        if ($request->slug) {
            $product = Product::where('slug', $request->slug)->with('productimages')->first();
        }
        $id = $product->id;
        $actiontype = $request->input('buy');
        // $shippingcharge = ShippingCharge::find($request->location)->select('charge')->first();
        //dd($shippingcharge);
        if ($request->input('buy') and $request->quantity <= $product->quantity) {
            //dd('ok');
            $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
            $user_id = Auth::id();
            $user = User::where('id', $user_id)->with('address', 'shippingaddress')->first();
            return view('Frontend.shop.checkout.index', compact('productcategories', 'quantity', 'product', 'actiontype', 'user'));
            //  return Redirect::route('frontend.checkout', ['productcategories' => $productcategories, 'quantity' => $quantity, 'product' => $product, 'actiontype' => $actiontype, 'user', $user]);
            //  return view('Frontend.shop.checkout.index')->with('productcategories', $productcategories)->with('quantity', $quantity)->with('product', $product)->with('actiontype', $actiontype)->with('user', $user);
        } elseif ($request->input('buy') and $request->quantity > $product->quantity) {
            Alert::success('Currently, we are out of Stock. we hope it will be back in stock soon.', 'You can Contact Us to more Details.');
            return redirect()->back();
        }


        if ($request->input('cart') or $request->slug) {

            if ($request->quantity <= $product->quantity) {

                $cart = $request->input('cart');
                $id = $product->id;
                if (!$product) {
                    abort(404);
                }
                $cart = session()->get('cart');

                // if cart is empty then this the first product
                if (!$quantity) {
                    $quantity = '1';
                }
                if (!$cart) {
                    $cart = [
                        $id => [
                            "id" => $product->id,
                            "name" => $product->product_title,
                            "quantity" => $quantity,
                            "price" => $product->sale_price,
                            "photo" => $product->image,
                            "slug" => $product->slug,

                        ]

                    ];

                    session()->put('cart', $cart);
                    toast('Product added to cart successfully!', 'success');
                    return redirect()->back()->with('message', 'Product added to cart successfully!');
                }

                // if cart not empty then check if this product exist then increment quantity
                if (isset($cart[$id]) && $quantity == 1) {
                    $cart[$id]['quantity']++;
                    session()->put('cart', $cart);
                    toast('Product added to cart successfully!', 'success');
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                } elseif (isset($cart[$id]) && $quantity > 1) {
                    $cart = session()->get('cart');
                    $cart[$id]["id"] = $product->id;
                    $cart[$id]["name"] = $product->product_title;
                    $cart[$id]["quantity"] = $quantity;
                    $cart[$id]["price"] = $product->sale_price;
                    $cart[$id]["photo"] = $product->image;
                    $cart[$id]["slug"] = $product->slug;

                    session()->put('cart', $cart);
                    toast('Product added to cart successfully!', 'success');
                    return redirect()->back()->with('success', 'Product added to cart successfully!');
                }

                // if item not exist in cart then add to cart with quantity = 1
                $cart[$id] = [
                    "id" => $product->id,
                    "name" => $product->product_title,
                    "quantity" => $quantity,
                    "price" => $product->sale_price,
                    "photo" => $product->image,
                    "slug" => $product->slug,
                ];


                $shipingchrge = session()->get('shipingchrge');

                session()->put('cart', $cart);
                //dd(session()->get('cart'));
                toast('Product added to cart successfully!', 'success');
                return redirect()->back()->with('success', 'Product added to cart successfully!');
            } elseif ($request->input('cart') and $request->quantity > $product->quantity) {
                Alert::success('Currently, we are out of Stock. we hope it will be back in stock soon.', 'You can Contact Us to more Details.');
                return redirect()->back();
            }
            Alert::success('There is something wrong', 'You can Contact Us to more Details.');
            return redirect()->back();
        }
    }

    public function showcart()
    {
        //dd(session()->get('shipingchrge'));
        // dd(session()->get('cart'));
        //Session::flush();
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Frontend.shop.ShoppingCart.index', compact('productcategories'));
    }
}
