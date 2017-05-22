<?php
/**
 * Created by PhpStorm.
 * User: bojan
 * Date: 5/22/17
 * Time: 10:42 PM
 */

namespace Modules\Billing\Http\Controllers;

use Modules\Billing\Http\Requests\NewsletterConfirmRequest;

use Illuminate\Support\Facades\Mail;

class NewsletterController
{
    public function confirm(NewsletterConfirmRequest $request) {

        $email = $request->input("email");


        Mail::send('email.newsletter.confirmation', ['title' => 'Newsletter confirmation', 'content' => 'Confirm email: '], function ($message)
        {
            $message->from('bojan.kovacec@gmail.com', 'Bojan Kov');
            $message->to('bojan.kovacec@gmail.com');

        });


        return view('newsletter.confirm');
    }

}