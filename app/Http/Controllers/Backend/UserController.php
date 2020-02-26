<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\User\User;
use App\Model\UserDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user_details = UserDetail::all();
        return view('backend.student', compact('users', 'user_details'));
    }
}
