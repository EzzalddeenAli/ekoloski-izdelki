<?php

namespace Modules\Billing\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Translatable;

    protected $table = 'billing__orders';
    public $translatedAttributes = [];
    protected $fillable = ['email', 'product'];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
