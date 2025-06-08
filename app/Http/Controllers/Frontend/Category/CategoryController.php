<?php

namespace App\Http\Controllers\Frontend\Category;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function idenx()
    {
        $categories = ProductCategory::all();
        //dd($categories);
        return view('Frontend.productCategory.index', compact(''));
    }
    public function show($slug)
    {
        $categories = ProductCategory::where('slug', $slug)->with('products')->first();
        $categorymenu = ProductCategory::get();
        $reviews = Review::all();
        $categorysidebar = Product::latest()->get();
        return view('Frontend.productCategory.index', compact('categorymenu', 'categories', 'reviews', 'categorysidebar'));
    }

    public function shop()
    {
        //$categories = ProductCategory::where('slug', $slug)->with('products')->first();
        $products = Product::paginate(7);
        $categorymenu = ProductCategory::get();
        $reviews = Review::all();
        $categorysidebar = Product::latest()->get();
        return view('Frontend.shop.shop.index', compact('products', 'categorymenu', 'reviews', 'categorysidebar'));
    }
}
