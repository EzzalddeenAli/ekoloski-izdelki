<?php

namespace Modules\Item\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use Translatable;

    protected $table = 'item__items';
    public $translatedAttributes = [];
    protected $fillable = ['name', 'description', 'price'];

    /*
    public function posts(Item $item) {
        $this = $item;
        $this->save();
    }
    */

}
