<?php

namespace App\Http\Controllers\Mail;

use App\Mail\Auth\AuthMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Auth\DashboardRegister;
use Illuminate\Support\Facades\Mail;
use App\Mail\Auth\DashUserUpdateMail;
use App\Mail\Auth\ForgetpasswordMail;
use App\Mail\Auth\FrontUserUpdateMail;
use App\Mail\Auth\DashUserRegisterMail;
use App\Mail\Auth\FrontUserRegisterMail;

class AuthMailController extends Controller
{
    // send Email - After Sign Up
    public static function SendDashRegisterMail($name, $email)
    {
        $data = [
            'name' => $name,
            'email' => $email,

        ];
        Mail::to($email)->send(new DashUserRegisterMail($data));
    }
    // send Email - After Sign Up
    public static function SendDashUserupdateMail($name, $email)
    {
        $data = [
            'name' => $name,
            'email' => $email,

        ];
        Mail::to($email)->send(new DashUserUpdateMail($data));
    }
    // send Email - After Sign Up
    public static function FrontUserRegisterMail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'email' => $email,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new FrontUserRegisterMail($data));
    }

    public static function FrontUserUpdateMail($name, $email)
    // send Email - After User Update User Details
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($email)->send(new FrontUserUpdateMail($data));
    }

    public static function ForgetpasswordMail($name, $email, $remember_token)
    // send Email - After User Update User Details
    {
        $data = [
            'name' => $name,
            'remember_token' => $remember_token,
        ];
        Mail::to($email)->send(new ForgetpasswordMail($data));
    }
}
