<?php

namespace Modules\Billing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use Translatable;

    protected $table = 'billing__subscriptions';
    public $translatedAttributes = [];
    protected $fillable = [];
}
