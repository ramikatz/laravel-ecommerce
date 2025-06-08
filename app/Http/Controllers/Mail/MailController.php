<?php

namespace App\Http\Controllers\Mail;

use App\Mail\SignUpEmail;
use Illuminate\Http\Request;
use App\Mail\OrderCompleteMail;
use App\Mail\AccountDetailUpdate;
use App\Mail\QuoteMail\Quotation;
use App\Mail\CreateUserbyAdminMail;
use App\Http\Controllers\Controller;
use App\Mail\ReplySupportTicketMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\CreateSupportTicketMail;

class MailController extends Controller
{
    // send Email - After Sign Up
    public static function SendSignupEmail($name, $email, $verification_code)
    {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignUpEmail($data));
    }

    // send Email - Requesting Quotes
    public static function Sendquotation($title, $content, $created_user, $number, $userName, $email, $created_at)
    {
        $data = [
            'title' => $title,
            'content' => $content,
            'created_user' => $created_user,
            'number' => $number,
            'userName' => $userName,
            'created_at' => $created_at,

        ];
        Mail::to($email)->send(new Quotation($data));
    }

    public static function SendAfterAdminCreateUser($name, $email)
    // send Email - After Admin Create User
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($email)->send(new CreateUserbyAdminMail($data));
    }

    public static function SendAccountDetailUpdate($name, $email)
    // send Email - After User Update User Details
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($email)->send(new AccountDetailUpdate($data));
    }

    public static function SendCreateSupportTikcet($name, $email)
    // send Email - After User Update User Details
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($email)->send(new CreateSupportTicketMail($data));
    }

    public static function SendReplySupportTikcet($name, $email)
    // send Email - After User Update User Details
    {
        $data = [
            'name' => $name,
        ];
        Mail::to($email)->send(new ReplySupportTicketMail($data));
    }
    public static function SendOrderCompleteEmail($name, $email, $order_number, $total)
    {
        // send Email - Send Order Complete Email
        $data = [
            'name' => $name,
            'order_number' => $order_number,
            'total' => $total,

        ];
        Mail::to($email)->send(new OrderCompleteMail($data));
        //OrderCompleteMail kiynne mail class eke nama.
        //SendOrderCompleteEmail ekata oni namak danna puluwan
    }
}
