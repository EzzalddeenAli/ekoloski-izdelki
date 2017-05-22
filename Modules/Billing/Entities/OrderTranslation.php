<?php

namespace Modules\Billing\Entities;

use Illuminate\Database\Eloquent\Model;

class OrderTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'billing__order_translations';
}
