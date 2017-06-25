<?php

namespace Modules\Item\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class OpeningTime extends Model
{
    use Translatable;

    protected $table = 'item__openingtimes';
    public $translatedAttributes = [];
    protected $fillable = [];
}
