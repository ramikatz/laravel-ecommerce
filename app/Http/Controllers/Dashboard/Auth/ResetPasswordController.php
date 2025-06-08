<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\Auth\ForgetpasswordMail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Mail\AuthMailController;

class ResetPasswordController extends Controller
{
    public function forgetprocess(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $verifycode = sha1(time());
            $user->remember_token = $verifycode;
            $user->save();

            AuthMailController::ForgetpasswordMail($user->userName, $user->email, $user->remember_token);
            Alert::success('Password reset Code sent', 'Check your Email Account');
            return redirect()->route('login');
        } else {
            Alert::success('We can not find your Email.', 'Check your Email Address');
            return redirect()->route('login');
        }
    }


    public function verifypassword()
    {
        $remember_token = \Illuminate\Support\Facades\Request::get('passwordreset');
        $user = User::where(['remember_token' => $remember_token])->first(); // db eke verification_code ekata request get eken apu eka update karanwa
        //dd($user);
        if ($user == null) {
            // dd('no');
            return view('Frontend.Auth.forget', compact('user'));
            Alert::success('Verification Code not Valid.', 'If this problem persist, then contact us');
        } else {
            return view('Frontend.Auth.reset', compact('user'));
        }
    }
    public function resetprocess(Request $request, User $user)
    {

        if ($request->comfirm_password == $request->password) {
            $user->password = Hash::make($request->password);
            $user->save();
            Alert::success('You have Succfully reset your password.', 'Login with your new password');
            return redirect()->route('login');
        } else {
            Alert::success('password does not match.', 'Try Again');
            return redirect()->route('login');
        }
    }
}
