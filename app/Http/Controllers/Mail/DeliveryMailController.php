<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Mail\Tracking\TrackingMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DeliveryMailController extends Controller
{
    public static function SendTrackingMail($status, $email, $name, $order_number)
    {
        $data = [
            'status' => $status,
            'order_number' => $order_number,
            'name' => $name,
        ];
        Mail::to($email)->send(new TrackingMail($data));
    }
}
