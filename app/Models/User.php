<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'komu_users';

    protected $fillable = [
        'id',
        'username',
        'discriminator',
        'avatar'
    ];
}
