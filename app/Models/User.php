<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $connection = 'mongodb';
    protected $collection = 'komu_bwlusers';

    protected $fillable = [
        'id',
        'username',
        'discriminator',
        'avatar',
        'verified',
        'locale',
        'mfa_enabled',
        'refresh_token'
    ];
}
