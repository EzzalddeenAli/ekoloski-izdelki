<?php namespace Modules\Billing\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Item\Repositories\ItemRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class DeployController extends BasePublicController
{

    function deploy() {
        // return view('billing.legal.general');
        return "OK";
    }



}