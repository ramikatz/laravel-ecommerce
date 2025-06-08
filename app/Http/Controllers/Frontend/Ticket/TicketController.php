<?php

namespace App\Http\Controllers\Frontend\Ticket;

use App\Models\Order;
use App\Models\Ticket;
use App\Models\Ticketreply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function allticket()
    {
        $ticketNumbers = Ticket::where('user_id', Auth::user()->id)->paginate(5);
        $tiketorders = Order::where('user_id', Auth::user()->id)->get();
        return view('Frontend.myAccount.customerSupport.index', compact('tiketorders', 'ticketNumbers'));
    }
    public function createticket()
    {
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

        //SupportMailController::FrontSupportCreate($ticket->title, $ticket->user_id, $ticket->message);
        return redirect()->route('frontend.ticket.index');
    }

    public function showticket($ticket)
    {
        $ticket = Ticket::find($ticket);
        return view('Frontend.myAccount.customerSupport.show', compact('ticket'));
    }
    public function replystore(Request $request)
    {
        $ticketreply = new Ticketreply();
        $ticketreply->reply = $request->input('reply');
        $ticketreply->ticket_id = $request->input('ticketid');
        $ticketreply->user_id = Auth::id();
        $ticketreply->save();
        //SupportMailController::FrontSupportReply($ticketreply->reply, $ticketreply->user_id);
        return redirect()->route('frontend.ticket.index');
    }
}
