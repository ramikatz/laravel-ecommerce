<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgetController extends Controller
{
    public function forget()
    {
        return view('Frontend.Auth.forget');
    }
}
