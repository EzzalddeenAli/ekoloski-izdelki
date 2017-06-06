<?php namespace Modules\Billing\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Http\Request;

class SMSController extends BasePublicController
{

    public function test()
    {
        return view('billing.sms.test');
    }


    public function send(Request $request)
    {

        if($request->input('secret') == 'xxxx') {
            $nexmo = app('Nexmo\Client');

            $nexmo->message()->send([
                'to' => $request->input('to'),   // 004915204412150
                'from' => $request->input('from'),  // 004915233991166
                'text' => $request->input('message')
            ]);

        }

        return view('billing.sms.sent');
    }

}