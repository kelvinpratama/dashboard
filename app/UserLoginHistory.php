<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLoginHistory extends Model
{
    protected $fillable = [
        'email',
    ];

    protected $table = 'dm_user_login_histories';
}
