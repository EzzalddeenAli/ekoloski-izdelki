<?php

namespace Modules\Billing\Http\Controllers;

use Modules\Billing\Http\Requests\NewsletterConfirmRequest;
use Modules\Billing\Entities\Customer;
use Modules\Billing\Utilities\Curl;

use Illuminate\Support\Facades\Mail;
use Modules\Billing\Mail\NewsletterConfirmation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


class NewsletterController
{



    /**
     * Send newsletter confirmation email.
     * Create a new customer if does not exist yet.
     *
     * @param NewsletterConfirmRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function sendConfirmation(NewsletterConfirmRequest $request, Curl $curl) {

        // check that user is human
        $response = json_decode($curl->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remote_ip' => $request->ip()
        ]));


        if(!$response->success) {
            abort(400, 'no');
        }


        $email = $request->input("email");
        $customer = Customer::whereEmail($email)->first();

        if(!$customer) {
            $customer = new Customer();
            $customer->email= $email;
        }

        // TODO: is thi fine ?
        if(!$customer->newsletter_token) {
            $customer->newsletter_token = bin2hex(random_bytes(16));
        }

        $locale = App::getLocale();

        $customer->locale = $locale;
        $customer->newsletter_registration_at = date('Y-m-d G:i:s');
        $customer->newsletter_registration_ip = $request->ip();

        $customer->save();
        Mail::to($email)->send(new NewsletterConfirmation($customer));

        return view('newsletter.confirm', compact('customer'));

    }


    /**
     * DOI
     */
    public function subscribe(Request $request, $token) {

        $customer = Customer::where('newsletter_token', '=', $token)->first();

        if($customer && $customer->newsletter_token == $token) {

            $customer->newsletter_active = true;
            $customer->newsletter_confirmed = true;
            $customer->newsletter_confirmed_at = date('Y-m-d G:i:s');
            $customer->newsletter_confirm_ip = $request->ip();

            $customer->save();

            return view('newsletter.subscribed');

        } else {

            return view('newsletter.token-not-found');
        }

    }


    public function unsubscribe(Request $request, $token = null) {

        if($request->isMethod('post')) {
            $customer = Customer::whereEmail($request->input('email'))->first();

            if(empty($customer)) {
                $msg = "Elektronskega naslova " . $request->input('email') . ' ni v nasi bazi podatkov.';
                return view('newsletter.unsubscribe', compact('msg'));
            }

            return view('newsletter.unsubscribed');

        } else {

            if($token != null) {
                $customer = Customer::where('newsletter_token', '=', $token)->first();
                $customer->newsletter_active = false;
                $customer->newsletter_unsubscribed_at = date('Y-m-d G:i:s');
                $customer->newsletter_unsubscribe_ip = $request->ip();
                $customer->save();

                return view('newsletter.unsubscribed');
            }

            return view('newsletter.unsubscribe');
        }

    }

}