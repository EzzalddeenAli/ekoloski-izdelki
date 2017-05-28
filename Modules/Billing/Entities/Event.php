<?php

namespace Modules\Billing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{
    // use Translatable;

    protected $table = 'billing__events';
    // public $translatedAttributes = [];
    protected $fillable = [];
}
