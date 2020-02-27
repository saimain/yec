<?php

namespace App\Http\Controllers\Backend;

use App\Model\Course;
use App\Model\Lecture;
use App\Model\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $lectures = Lecture::all();
        $courses = Course::all();

        return view('backend.dashboard', compact('users', 'lectures', 'courses'));
    }
}
