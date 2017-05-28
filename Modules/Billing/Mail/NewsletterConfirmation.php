<?php

namespace Modules\Billing\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewsletterConfirmation extends Mailable
{
    use Queueable, SerializesModels;


    public $customer;

    /**
     * Create a new message instance.
     *
     * @param $customer
     */
    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(url('/') . ': potrdite prijavo na elektronske novice')
            ->text("email.newsletter.subscribe");

        //->from('newsletter@mail.ekoloski-izdelki.si')
        //->view('emails.newsletter.confirmation');

    }

}