<?php

namespace App\Http\Controllers\Frontend\Livesearch;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class LiveSearchController extends Controller
{
    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $searchproducts = Product::query()
            ->where('product_title', 'LIKE', "%{$search}%")
            ->orWhere('product_sub', 'LIKE', "%{$search}%")
            ->paginate(10);
        $categorysidebar = Product::latest()->get();
        //dd($categorysidebar);

        // Return the search view with the resluts compacted
        return view('Frontend/productSearch/index', compact('searchproducts', 'categorysidebar'));
    }
}
