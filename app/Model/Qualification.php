<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $guarded = [];
    
    public function lecture()
    {
        return $this->hasOne('App\Model\Lecture');
    }
}
