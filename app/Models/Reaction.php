<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Reaction extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwlreactions';
}
