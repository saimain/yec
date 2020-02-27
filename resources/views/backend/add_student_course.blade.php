@extends('backend.layout.app')
@section('student-menu','mm-active')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('backend/select2-bootstrap4.min.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endsection
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-bookmarks icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Add Student Course
            <div class="page-title-subheading">This is the page for add a course of student.
            </div>
        </div>
    </div>
</div>
@endsection


@section('main-content')


@php
$user_data = Session::get('user');
@endphp
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Student Course Informations</h5>
        <form class="" action="/students/add/course" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="email" class="">Student Email
                        </label><input name="email" id="email" placeholder="Student Email" type="email"
                            class="form-control" value="{{$user_data['email']}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="course" class="">Course</label>
                        <select class="mb-2 form-control course-select" name="course_id">
                            <option selected disabled>Select Course</option>
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>


            <button class="mt-2 btn btn-primary">Add Course</button>
        </form>
    </div>
</div>
@endsection


@section('js')

<script>
    $(document).ready(function() {
        $('.course-select').select2({
            theme: 'bootstrap4',
        });
    });
</script>

@endsection