<?php

namespace App\Mail\Tracking;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrackingMail extends Mailable
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
        return $this->from(('changelang001@gmail.com'), 'SunRay')->subject('Your Order is ' . $this->email_data['status'])->view('Mail.Tracking.index', ['email_data' => $this->email_data]);
    }
}
