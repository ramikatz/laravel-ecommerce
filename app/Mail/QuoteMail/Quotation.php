<?php

namespace App\Mail\QuoteMail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Quotation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->email_data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from(env('MAIL_USERNAME'), 'SunRay')->subject("Welcome to SunRay!")->view('mails.signup', ['email_data' => $this->email_data]);

        return $this->from(('roomikat@gmail.com'), 'SunRay')->subject('Requesting Quotation')->view('Mail.Quotation.Quote', ['email_data' => $this->email_data]);
    }
}
