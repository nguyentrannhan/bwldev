<?php

namespace App\Models;


use Jenssegers\Mongodb\Eloquent\Model as Model;


class Message extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwls';

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'messageId', 'messageId');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'messageId', 'messageId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'authorId', 'id');
    }
}
