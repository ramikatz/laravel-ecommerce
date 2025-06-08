<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Mail\AuthMailController;


class RegisterController extends Controller
{
    public function index()
    {
        return view('Backend.Auth.register');
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
        //dd($request);
        $user = new User();

        $user->userName = $request->userName;
        $user->email = $request->email;
        $user->verification_code = sha1(time());
        if ($request->comfirm_password == $request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        //assign Default Role
        $role = Role::select('id')->where('name', 'customer')->first();
        $user->roles()->attach($role);

        //Send Mail
        if ($user !== null) {
            AuthMailController::FrontUserRegisterMail($user->userName, $user->email, $user->verification_code);
            Alert::success('please Verify Your Email.', 'Check your mail and Verify');
            return redirect()->route('login')->with('success', 'please Verify Your Email');
        }
        Alert::success('Something Went wrong', 'please contact us');
        return redirect()->route('register')->with('danger', 'Something Went wrong');

        /*       return redirect()->route('dashboard.user.index')
            ->with('success', 'User Created successfully'); */
    }

    //after click Comfirmation Link
    public function verifyUser()
    {
        //dd($request);
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        //$user = User::where(['verification_code'=>$verification_code])->get(); // methaa get dala wadak na. mokda ekkenaineh inneh. ithin first danna
        $user = User::where(['verification_code' => $verification_code])->first(); // db eke verification_code ekata request get eken apu eka update karanwa
        if ($user != null) {
            $user->is_verified = 1;
            $user->save();
            Alert::success('Your Account is Verified', 'Thank you');
            return redirect()->route('login')->with('success', 'Your Account is Verified');
        }
        Alert::success('Your Account Can not be Verified', 'Contact Us');
        return redirect()->route('login')->with('danger', 'Your Account Can not be Verified');
    }
}
