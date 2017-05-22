<?php

namespace Modules\Billing\Entities;

use Illuminate\Database\Eloquent\Model;

class CustomerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'billing__customer_translations';
}
