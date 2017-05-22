<?php

namespace Modules\Billing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;


class Customer extends Model
{
    use Translatable;
    use Billable;

    protected $table = 'billing__customers';
    public $translatedAttributes = [];
    protected $fillable = [];
}
