<?php

namespace App\Http\Controllers\Dashboard\TicketManagement;

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
        $ticketNumbers = Ticket::with('user')->paginate(5);

        $tiketorders = Order::where('user_id', Auth::user()->id)->get();
        return view('Backend.portal.index', compact('tiketorders', 'ticketNumbers'));
    }
    public function createticket()
    {
        $tiketorders = Order::where('user_id', Auth::user()->id)->get();
        return view('Backend.portal.create', compact('tiketorders'));
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

        //  SupportMailController::FrontSupportCreate($ticket->title, $ticket->user_id, $ticket->message);
        return redirect()->route('dashboard.ticket.index');
    }

    public function showticket($ticket)
    {
        $ticket = Ticket::find($ticket);
        return view('Backend.portal.show', compact('ticket'));
    }
    public function replystore(Request $request)
    {

        if ($request->input('statusbtn')) {
            $ticket = Ticket::find($request->ticketid);
            $ticket->status = $request->statusvalue;
            $ticket->save();
            return redirect()->route('dashboard.ticket.index')->with('success', 'Order Status has been Updated successfully');
        } else {
            $ticketreply = new Ticketreply();
            $ticketreply->reply = $request->input('reply');
            $ticketreply->ticket_id = $request->input('ticketid');
            $ticketreply->user_id = Auth::id();
            $ticketreply->save();
            //SupportMailController::FrontSupportReply($ticketreply->reply, $ticketreply->user_id);
            return redirect()->route('dashboard.ticket.index')->with('success', 'Order Status has been Updated successfully');
        }
    }
}
