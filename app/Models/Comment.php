<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;


class Comment extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwlcomments';

    protected $with = 'user';

    public function user()
    {
        return $this->belongsTo(User::class, 'authorId', 'id');
    }
}
