<?php

namespace App\Http\Controllers\Frontend\Auth;

use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function __construct()
    { // login page wada karanne guest ayata
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();
        return view('Frontend.Auth.login', compact('productcategories'));
    }
}
