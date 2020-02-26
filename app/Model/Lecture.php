<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public function qualification()
    {
        return $this->hasOne('App\Model\Qualification');
    }
}
