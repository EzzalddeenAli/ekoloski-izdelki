<?php

namespace Modules\Billing\Http\Controllers;

use Modules\Billing\Http\Requests\NewsletterConfirmRequest;
use Modules\Billing\Entities\Customer;

use Illuminate\Support\Facades\Mail;
use Modules\Billing\Mail\NewsletterConfirmation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewsletterController
{
    /**
     * Send newsletter confirmation email.
     * Create a new customer if does not exist yet.
     *
     * @param NewsletterConfirmRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sendConfirmation(NewsletterConfirmRequest $request) {

        $email = $request->input("email");

        $customer = Customer::whereEmail($email)->first();

        if(!$customer) {
            $customer = new Customer();
            $customer->email= $email;
            $customer->registration_at = date('Y-m-d G:i:s');
            $customer->registration_ip = $request->ip();
        }

        if(!$customer->newsletter_confirmed) {
            $customer->newsletter_token = bin2hex(random_bytes(16));
        }

        $customer->save();

        Mail::to($email)->send(new NewsletterConfirmation($customer));

        return view('newsletter.confirm');
    }


    /**
     * DOI
     */
    public function subscribe(Request $request, $token) {

        $customer = Customer::where('newsletter_token', '=', $token)->first();

        if($customer->newsletter_token == $token) {

            $customer->newsletter_active = true;
            $customer->newsletter_confirmed = true;
            $customer->newsletter_confirmed_at = date('Y-m-d G:i:s');
            $customer->newsletter_confirm_ip = $request->ip();

            $customer->save();

            return view('newsletter.subscribed');
        } else {

            return view('newsletter.subscribe.token-not-found');
        }

    }


    public function unsubscribe(Request $request) {

        if($request->isMethod('post')) {
            $customer = Customer::whereEmail($request->input('email'))->first();

            if(empty($customer)) {
                $msg = "Elektronskega naslova " . $request->input('email') . ' ni v nasi bazi podatkov.';
                return view('newsletter.unsubscribe', compact('msg'));
            }

            return view('newsletter.unsubscribed');
        } else {
            return view('newsletter.unsubscribe');
        }
    }

}