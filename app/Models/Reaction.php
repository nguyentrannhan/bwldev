<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Model;


class Reaction extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwlreactions';

    public function message()
    {
        return $this->belongsTo(Message::class);
    }
}
