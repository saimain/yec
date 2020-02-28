<?php

namespace App\Model;

use App\Model\Course;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    protected $guarded = [];
    
    public function qualification()
    {
        return $this->belongsTo('App\Model\Qualification');
    }

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
