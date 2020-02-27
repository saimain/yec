<?php

namespace App\Model;

use App\Model\Lecture;
use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
