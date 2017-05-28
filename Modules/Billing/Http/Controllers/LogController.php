<?php
/**
 * Created by PhpStorm.
 * User: bojan
 * Date: 5/27/17
 * Time: 12:26 PM
 */

namespace Modules\Billing\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\Core\Http\Controllers\BasePublicController;


class LogController extends BasePublicController
{
    public function setFrontendToken(Request $request, $token) {
        Session::put('frontend_token', $token);
        return 'OK';
    }

}