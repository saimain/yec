<?php

namespace App\Model;

use App\Model\User\User;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'user_id', 'phone', 'dob', 'address', 'education', 'company', 'role', 'where'
    ];

    protected $dates = ['dob'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
