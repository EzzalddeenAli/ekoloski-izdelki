<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Model;

class ItemTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'item__item_translations';
}
