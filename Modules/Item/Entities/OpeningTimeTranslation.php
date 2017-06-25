<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Model;

class OpeningTimeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'item__openingtime_translations';
}
