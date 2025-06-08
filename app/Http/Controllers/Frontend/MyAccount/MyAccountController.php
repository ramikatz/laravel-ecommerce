<?php

namespace App\Http\Controllers\Frontend\MyAccount;

use App\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Address;
use App\Models\Ticketreply;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ShippingAddress;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Mail\AuthMailController;
use App\Http\Controllers\Mail\SupportMailController;

class MyAccountController extends Controller
{
    public function index()
    {
        $productcategories  = ProductCategory::where('parent_id', '=', 0)->with('subcategory')->get();

        //User's Orders
        $id = Auth::id();
        $orders = Order::where('user_id', $id)->paginate(15);

        //User Details
        $user = User::where('id', $id)->first();
        $useraddress = Address::where('user_id', $id)->first();

        return view('Frontend.myAccount.UserAccount.index', compact('orders', 'user', 'productcategories'));
    }
    public function edit($user)
    {

        $user = User::where('id', $user)->with('address', 'shippingaddress')->first();
        //dd($user);

        return view('Frontend.myAccount.UserAccount.update', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        //dd($request);
        $validatedData = $request->validate([
            'userName' => 'required|min:8',
            'Fname' => 'required|min:8',
            'Lname' => 'required|min:8',
            'email'    => 'required|email|max:255',
            'Fname' => 'required|min:8',
            // 'password' => 'required|min:8',
        ]);



        if ($request->file('image')) {
            File::delete('upload/user' . $user->image);
            $image = $request->file('image');
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user'), $my_image);
            // dd($my_image);
            $user->image = $my_image;
        }
        if ($request->gender == '1') {
            $gender = 1;
        } elseif ($request->gender == '0') {
            $gender = 0;
        }

        $user->gender = $gender;
        $user->userName = $request->userName;
        $user->Fname = $request->Fname;
        $user->Lname = $request->Lname;
        $user->email = $request->email;
        $user->bday = $request->bday;

        if (Hash::check($request->cpassword, $user->password)) {
            // The passwords match...
            if ($request->comfirm_password == $request->npassword) {
                $user->password = Hash::make($request->npassword);
            }
        }
        $user->save();

        $shippingaddress = ShippingAddress::where('user_id', $user->id)->first();
        $shippingaddress->shipping_fullname = $request->shipping_fullname;
        $shippingaddress->shipping_Cname = $request->shipping_Cname;
        $shippingaddress->shipping_address1 = $request->shipping_address1;
        $shippingaddress->shipping_address2 = $request->shipping_address2;
        $shippingaddress->shipping_city = $request->shipping_city;
        $shippingaddress->shipping_state = $request->shipping_state;
        $shippingaddress->shipping_postal_code = $request->shipping_postal_code;
        $shippingaddress->shipping_mobile = $request->shipping_mobile;
        $shippingaddress->user()->associate($user);
        //$shippingaddress->save()

        $billingaddress = Address::where('user_id', $user->id)->first();
        $billingaddress->billing_address_line_1 = $request->billing_address_line_1;
        $billingaddress->billing_address_line_2 = $request->billing_address_line_2;
        $billingaddress->billing_city = $request->billing_city;
        $billingaddress->billing_state = $request->billing_state;
        $billingaddress->billing_postal_code = $request->billing_postal_code;
        $billingaddress->billing_mobile = $request->billing_mobile;
        $billingaddress->billing_Cname = $request->billing_Cname;
        $billingaddress->user()->associate($user);
        //$billingaddress->save()


        if ($billingaddress->save() && $shippingaddress->save()) {
            $request->session()->flash('success', 'User Has Been Updated Successfully');
        } else {
            $request->session()->flash('danger', 'User Has not Been Updated Successfully');
        }

        //  AuthMailController::FrontUserUpdateMail($user->Fname, $user->email);

        return redirect()->route('frontend.user.index');
        //return redirect()->route('dashboard.user.index');
    }
    public function myorderlist()
    {
        //User's Orders
        $id = Auth::id();
        $orders = Order::where('user_id', $id)->paginate(5);

        //User Details
        $user = User::where('id', $id)->first();
        $useraddress = Address::where('user_id', $id)->first();

        return view('Frontend.myAccount.orderHistory.index', compact('orders', 'user'));
    }
    public function orderlistitem($order)
    {
        //dd($order);
        $order = Order::where('id', $order)->with('order_items')->first();
        //dd($order);
        // $orderItems = Order::with('order_items')->where('id', $order->id)->first();
        //dd($orderItems);
        return view('Frontend.myAccount.orderHistory.order', compact('order'));
    }


    public function trackingshow($id)
    {
        $item = Order::where('id', $id)->first();
        return view('Frontend.myAccount.myOrderTracking.show', compact('item'));
    }

    // log wela nathi knk
    public function trackingindex()
    {
        return view('Frontend.myAccount.myOrderTracking.index');
    }
    // log wela nathi knk
    public function trackingstore(Request $request)
    {
        $item = Order::where('order_number', $request->tracking_code)->first();
        return view('Frontend.myAccount.myOrderTracking.guest', compact('item'));
    }


    /* public function allticket()
    {
        //Ticket Contrller
        $ticketNumbers = Ticket::where('user_id', Auth::user()->id)->paginate(5);
        $tiketorders = Order::where('user_id', Auth::user()->id)->get();
        return view('Frontend.myAccount.customerSupport.index', compact('tiketorders', 'ticketNumbers'));
    }
    public function createticket()
    {
        //dd('dd');
        $tiketorders = Order::where('user_id', Auth::user()->id)->get();
        return view('Frontend.myAccount.customerSupport.create', compact('tiketorders'));
    }
    public function ticketstore(Request $request)
    {
        $ticket = new Ticket();
        $ticket->title = $request->input('title');
        $ticket->message = $request->input('message');
        $ticket->ticket_id = uniqid('Ticket-');
        $ticket->order_number = $request->input('order_number');
        $ticket->type = $request->input('type');
        $ticket->user_id = Auth::id();
        $ticket->save();

        SupportMailController::FrontSupportCreate($ticket->title, $ticket->user_id, $ticket->message);
        return redirect()->route('frontend.ticket.index');
    }

    public function showticket($ticket)
    {

        $id = Auth::user()->id;
        //dd($id);
        //$tickets = Ticket::with('user')->where('user_id', Auth::user()->id)->where('ticket_id', $ticket)->orwhere('user_id', 5)->where('ticket_id', $ticket)->get();
        $ticketreplies = Ticketreply::with('user')->where('user_id', Auth::user()->id)->where('ticket_id', $ticket)->orwhere('user_id', 5)->where('ticket_id', $ticket)->get();
        //$ticketreplies = Ticketreply::with('user')->where('user_id', $id)->where('ticket_id', $ticket)->get();
        $ticket = Ticket::find($ticket);
        //dd($ticketreplies);

        return view('Frontend.myAccount.customerSupport.show', compact('ticket', 'ticketreplies'));
    }
    public function replystore(Request $request)
    {
        $ticketreply = new Ticketreply();
        $ticketreply->reply = $request->input('reply');
        $ticketreply->ticket_id = $request->input('ticketid');
        $ticketreply->user_id = Auth::id();
        $ticketreply->save();
        SupportMailController::FrontSupportReply($ticketreply->reply, $ticketreply->user_id);
        return redirect()->route('frontend.ticket.index');
    } */
}
