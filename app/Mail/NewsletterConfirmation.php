<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this//->from('newsletter@mail.ekoloski-izdelki.si')
                    //->view('emails.newsletter.confirmation');
                    ->text("emails.newsletter.confirmation");
    }
}
