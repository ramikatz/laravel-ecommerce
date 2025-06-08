<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Mail\OrderMail\InvoiceMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail\ResendOrderMail;

class OrderMailController extends Controller
{

    public static function SendOrderInvoice($email, $Fname, $orderNumber, $orderTotal)
    {
        $data = [
            'name' => $email,
            'Fname' => $Fname,
            'orderNumber' => $orderNumber,
            'orderTotal' => $orderTotal,

        ];
        Mail::to($email)->send(new InvoiceMail($data));
    }

    public static function ResendSendOrderCompleteEmail($email, $Fname, $orderNumber, $orderTotal)
    {
        $data = [
            'name' => $email,
            'Fname' => $Fname,
            'orderNumber' => $orderNumber,
            'orderTotal' => $orderTotal,

        ];
        Mail::to($email)->send(new ResendOrderMail($data));
    }
}
