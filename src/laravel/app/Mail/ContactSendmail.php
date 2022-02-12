<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactSendmail extends Mailable
{
    use Queueable, SerializesModels;

    private $email;
    private $message;
    private $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        // $this->email = $contact['contact-message'];
        // $this->message = $contact['contact_message'];
        $this->contact = $contact;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this
        ->from('tsukurie@noreply.com')
        // ->from($this->email)
        ->subject('自動送信メール')
        ->view('main.mail', ['contact' => $this->contact]);


    }
}
