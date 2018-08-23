<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
      'email', 'MID','TID',
    ];

    protected $table = 'dm_user_details';



}
