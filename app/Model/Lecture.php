<?php

namespace App\Model;

use App\Model\Course;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public function qualification()
    {
        return $this->hasOne('App\Model\Qualification');
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
