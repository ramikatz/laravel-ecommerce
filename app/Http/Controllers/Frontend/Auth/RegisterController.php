<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Frontend.Auth.register', compact('productcategories'));
    }
}
