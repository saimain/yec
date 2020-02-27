<?php

namespace App\Http\Controllers\Backend;

use App\Model\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Model\Lecture;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('backend.course', compact('courses'));
    }

    public function addform()
    {
        $courses = Course::all();
        $lectures = Lecture::all();
        return view('backend.add_course', compact('courses', 'lectures'));
    }

    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'lecture_id' => 'required'
        ], [
            'name.required' => 'Enter Course Name',
            'lecture_id.required' => 'Choose Lecture for course',
        ]);

        $course = Course::create([
            'name' => request('name'),
            'lecture_id' => request('lecture_id'),
            'description' => request('description'),
            'start' => request('start'),
            'end' => request('end'),
            'duration' => request('duration'),
            'timetable' => request('timetable'),
            'fees' => request('fees'),
            'exam' => request('exam'),
            'examregfees' => request('examregfees'),
            'examfees' => request('examfees'),
            'note' => request('note'),
            'cover' => request('cover')
        ]);

        return redirect('/courses/add')->with('success', 'Course Added');
    }

    public function detail($id)
    {
        $course = Course::find($id);
        $lectures = Lecture::all();
        return view('backend.course_detail', compact('course', 'lectures'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->name = request('name');
        $course->lecture_id = request('lecture_id');
        $course->description = request('description');
        $course->start = request('start');
        $course->end = request('end');
        $course->duration = request('duration');
        $course->timetable = request('timetable');
        $course->fees = request('fees');
        $course->exam = request('exam');
        $course->examregfees = request('examregfees');
        $course->examfees = request('examfees');
        $course->note = request('note');
        $course->status = request('status');


        $course->update();
       
        $lectures = Lecture::all();
        return view('backend.course_detail', compact('course', 'lectures'));
    }
}
