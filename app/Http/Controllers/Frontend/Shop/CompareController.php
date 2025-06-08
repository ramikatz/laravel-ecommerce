<?php

namespace App\Http\Controllers\Frontend\Shop;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompareController extends Controller
{
    public function index()
    {
        //dd('ok');
        $compare = session()->get('compare');
        return view('Frontend.shop.compare.index', compact('compare'));
    }
    public function edit(Product $product)
    {
        // dd($product);
        $compare = session()->get('compare');
        $id = $product->id;
        // if Compare is empty then this the first Compare
        if (!$compare) {
            $compare = [
                $id => [
                    "product_id" => $product->id,
                    "name" => $product->product_title,
                    "quantity" => 1,
                    "price" => $product->sale_price,
                    "photo" => $product->image,
                    "photo" => $product->image,
                    "slug" => $product->slug,
                ]
            ];
            session()->put('compare', $compare);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $compare[$id] = [
            "product_id" => $product->id,
            "name" => $product->product_title,
            "quantity" => 1,
            "price" => $product->sale_price,
            "photo" => $product->image,
            "slug" => $product->slug,
        ];
        session()->put('compare', $compare);
        //dd('ok');
        return redirect()->back()->with('success', 'Product added to cart successfully!');

        //return view('Frontend.compare.index',compact('compare'));


    }
    public function delete($id)
    {
        // dd($slug);
        if ($id) {
            $compare = session()->get('compare');
            if (isset($compare[$id])) {
                unset($compare[$id]);
                session()->put('compare', $compare);
            }
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
}
