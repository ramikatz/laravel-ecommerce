<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    { // login page wada karanne guest ayata
        $this->middleware('guest')->except('logout');
    }
    public function index()
    {
        return view('Backend.Auth.login');
    }
    public function process(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if (Auth::user()->hasRole('keymaster')) {
                return redirect(route('dashboard.index'));
            } elseif (Auth::user()->hasRole('admin')) {
                return redirect(route('dashboard.index'));
            } elseif (Auth::user()->hasRole('staff')) {
                return redirect(route('dashboard.index'));
            } elseif (Auth::user()->hasRole('customer')) {
                return redirect(route('frontend.index'));
            } elseif (Auth::user()->hasRole('developer')) {
                return redirect(route('dashboard.index'));
            } elseif (Auth::user()->hasRole('supplier')) {
                return redirect(route('dashboard.index'));
            }
        } else {
            return redirect()->back()->with('danger', 'Your Email Or Password is Wrong');
        }
    }
    public function logout()
    {
        Session::forget('cart');
        auth::logout();
        return redirect()->to('user-login');
    }
}
