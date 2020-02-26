<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    public function detail()
    {
        return $this->hasOne('App\Model\User\User');
    }
}
