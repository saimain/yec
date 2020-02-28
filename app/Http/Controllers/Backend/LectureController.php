<?php

namespace App\Http\Controllers\Backend;

use App\Model\Course;
use App\Model\Lecture;
use App\Model\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::all();
        $qualifications = DB::table('qualifications')->latest()->orderBy('id', 'desc')->get();

        return view('backend.lecture', compact('lectures', 'qualifications'));
    }

    public function detail($id)
    {
        $course = Course::find($id);
        $lecture = Lecture::find($id);
        $qualifications = DB::table('qualifications')->latest()->orderBy('id', 'desc')->get();

        return view('backend.lecture_detail', compact('course', 'lecture', 'qualifications'));
        // return $lecture->course()->get();
    }

    public function addform()
    {
        $qualifications = DB::table('qualifications')->latest()->orderBy('id', 'desc')->get();
        return view('backend.add_lecture', compact('qualifications'));
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'qualification_id' => 'required',
        ], [
            'name.required' => 'Enter Lecture Name',
            'email.required' => 'Enter Lecture Email',
            'phone.required' => 'Enter Lecture Phone',
            'dob.required' => 'Enter Date of Birth',
            'address.required' => 'Enter Lecture Address',
            'qualification_id.required' => 'Choose Lecture Qualification',
        ]);

        $lecture = Lecture::create([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
            'dob' => request('dob'),
            'address' => request('address'),
            'qualification_id' => request('qualification_id'),
            'bio' => request('bio'),
        ]);

        return redirect('/lectures/add')->with('success', 'Lecture Added');
    }

    public function update(Request $request, $id)
    {
        $lecture = Lecture::find($id);
        $lecture->name = request('name');
        $lecture->email = request('email');
        $lecture->phone = request('phone');
        $lecture->dob = request('dob');
        $lecture->address = request('address');
        $lecture->qualification_id = request('qualification_id');
        $lecture->bio = request('bio');


        $lecture->update();
       
        $course = Course::find($id);
        $lecture = Lecture::find($id);
        $qualifications = DB::table('qualifications')->latest()->orderBy('id', 'desc')->get();

        return view('backend.lecture_detail', compact('course', 'lecture', 'qualifications'));
    }
}
