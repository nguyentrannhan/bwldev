<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Model;


class Image extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwls';

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'messageId', 'messageId');
    }
}
