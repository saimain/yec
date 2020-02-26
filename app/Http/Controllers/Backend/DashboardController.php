<?php

namespace App\Http\Controllers\Backend;

use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lecture;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $lectures = Lecture::all();
        return view('backend.dashboard', compact('users', 'lectures'));
    }
}
