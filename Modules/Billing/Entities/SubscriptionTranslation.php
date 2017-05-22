<?php

namespace Modules\Billing\Entities;

use Illuminate\Database\Eloquent\Model;

class SubscriptionTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'billing__subscription_translations';
}
