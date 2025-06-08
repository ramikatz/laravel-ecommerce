<?php

namespace App\Http\Controllers\Mail;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Support\SupportTicketMail;

class SupportMailController extends Controller
{
    public static function FrontSupportCreate($title, $user_id, $message)
    // send Email - After User Update User Details
    {
        $user = User::where('id', $user_id)->first();
        $email = User::where('id', $user_id)->select('email')->first();
        $data = [
            'title' => $title,
            'Fname' => $user->Fname,
            'email' => $user->email,
            'message' => $message,

        ];
        Mail::to($email)->send(new SupportTicketMail($data));
    }

    public static function FrontSupportReply($title, $user_id)
    // send Email - After User Update User Details

    {
        $user = User::where('id', $user_id)->first();
        $email = User::where('id', $user->id)->select('email')->first();
        $data = [
            'title' => $title,
            'Fname' => $user->Fname,
            'email' => $user->email,
        ];
        Mail::to($email)->send(new SupportTicketMail($data));
    }
}
