<?php

namespace Modules\Billing\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public $email;

    /**
     * Create a new message instance.
     *
     * @param $email
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
        return $this->text("emails.newsletter.confirmation");//->from('newsletter@mail.ekoloski-izdelki.si')
        //->view('emails.newsletter.confirmation');

    }

}