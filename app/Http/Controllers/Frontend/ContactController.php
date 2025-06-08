<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ContactController extends Controller
{
    public function getContact()
    {
        return view('Frontend.pages.contactUs');
    }
    public function saveContact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|email',
            'subject' => 'required|min:10',
            'message' => 'required|min:20',
        ]);


        $user = Auth::user();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->user_id = $user->id;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();


        /* Mail::send(
            'Mail.ContactUs.index',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'subject' => $request->get('subject'),
                'phone_number' => $request->get('phone_number'),
                'user_message' => $request->get('message'),
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                $message->to('roomikat@gmail.com');
                $message->subject('You have new Message from Sunray');
            }
        ); */
        Alert::success('We have recived your message and we will get back to you withing 24 hours', 'Success Message');
        return redirect()->back();
    }
}
