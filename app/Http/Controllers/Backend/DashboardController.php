<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Model\Event;
use App\Model\Course;
use App\Model\Lecture;
use App\Model\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $lectures = Lecture::all();
        $courses = Course::all();
        $events = DB::table('events')->where('status', 0)->get();

        $user_bd = User::with('detail')->get();
        $dateToCompare = Carbon::now()->tomorrow()->format('d M');


        return view('backend.dashboard', compact('users', 'lectures', 'courses', 'events', 'user_bd'));
    }
}
