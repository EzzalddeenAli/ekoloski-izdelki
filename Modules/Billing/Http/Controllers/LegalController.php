<?php namespace Modules\Billing\Http\Controllers;

use Illuminate\Support\Facades\App;
use Modules\Item\Repositories\ItemRepository;
use Modules\Core\Http\Controllers\BasePublicController;

class LegalController extends BasePublicController
{

    function general() {
        return view('billing.legal.general');
    }

}