<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class UserCu extends Model
{
    protected $table = 'user_cu';

    protected $fillable = [
        'username',
        'password'
    ];
}
