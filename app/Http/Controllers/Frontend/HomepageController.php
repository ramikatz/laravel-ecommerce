<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public function index()

    {
        $phones = ProductCategory::with('products')->where('name', 'Phones')->first();
        // dd($phones);
        $laptops = ProductCategory::with('products')->where('name', 'Laptops')->first();
        $tvs = ProductCategory::with('products')->where('name', 'TVs')->first();
        $hometheater = ProductCategory::with('products')->where('name', 'Home Theater System')->first();

        $slidingBanner = Product::get();
        $slider = ProductCategory::where('parent_id', '0')->latest()->get();

        $Newarrivals = Product::latest()->get();
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();

        return view('Frontend.home.index', compact('hometheater', 'tvs', 'laptops', 'phones', 'slider', 'Newarrivals', 'slidingBanner', 'productcategories'));
    }
}
