<?php

namespace App\Http\Controllers\Backend;

use App\Model\Course;
use App\Model\User\User;
use App\Model\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('backend.student', compact('users'));
    }

    public function addform()
    {
        return view('backend.add_student');
    }


    public function add(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'education' => 'required',
        ], [
            'name.required' => 'Enter Student Name',
            'email.required' => 'Enter Student Email',
            'password.required' => 'Enter Password',
            'phone.required' => 'Ente Phone Number',
            'dob.required' => 'Enter Date of Birth',
            'address.required' => 'Enter Student Address',
            'education.required' => 'Enter Education Level',
        ]);


        $user = User::create([
            'name' => request('name'),
            'email' =>  request('email'),
            'password' => Hash::make(request('password')),
        ]);

        $user->detail()->create([
            'phone' => request('phone'),
            'dob' => request('dob'),
            'address' => request('address'),
            'education' => request('education'),
            'company' => request('company'),
            'role' => request('role'),
            'where' => request('where')
        ]);

        return redirect('/students/add/course')->with(['user' => $user->detail]);
    }


    public function addcourseform()
    {
        $courses = DB::table('courses')->where('status', 0)->get();
        return view('backend.add_student_course', compact('courses'));
    }

    public function addcourse(Request $request)
    {
        $validatedData = $request->validate([
            'phone' => 'required',
            'course_id' => 'required'
        ], [
            'phone.required' => 'Enter Student Phone',
            'course_id.required' => 'Choose Course'
        ]);


        $user_target = UserDetail::where('phone', $request->phone)->first();


        $course = Course::find(request('course_id'));

        $user_target->user->course()->syncWithoutDetaching($course);
        // return $user_target::with('course')->get();
        return redirect('/students/add')->with('success', 'Student Added');
    }

    public function detail($id)
    {
        $user = User::find($id);
        $user_course = $user->course()->get();

        return view('backend.student_detail', compact('user', 'user_course'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = request('name');


        $user->detail()->update([
            'phone' => request('phone'),
            'dob' => request('dob'),
            'address' => request('address'),
            'education' => request('education'),
            'company' => request('company'),
            'role' => request('role'),
            'where' => request('where')
        ]);


        $user_course = $user->course()->get();

        return view('backend.student_detail', compact('user', 'user_course'));
    }
}
