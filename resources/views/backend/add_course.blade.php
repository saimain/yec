@extends('backend.layout.app')
@section('course-menu','mm-active')
@section('css')


<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<link href="{{asset('backend/select2-bootstrap4.min.css')}}" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.11/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Add New Course
            <div class="page-title-subheading">This is the page for add a course.
            </div>
        </div>
    </div>
</div>
@endsection



@section('main-content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">New Course Informations</h5>
        <form class="" action="/courses/add" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="name" class="">Course Name <div
                                class="mb-2 mr-2 badge badge-pill badge-info">Required</div> </label><input name="name"
                            id="name" placeholder="Course Name" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="lecture" class="">Lecture <div
                                class="mb-2 mr-2 badge badge-pill badge-info">Required</div></label>
                        <select class="mb-2 form-control lecture-select" name="lecture_id">
                            <option selected disabled>Select Lecture</option>
                            @foreach($lectures as $lecture)
                            <option value="{{$lecture->id}}">{{$lecture->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="summernote" class="">Course Description</label>
                        <textarea id="summernote" name="description"></textarea>
                    </div>
                </div>
            </div>
            <div class="divider mt-0" style="margin-bottom: 20px;"></div>

            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="start" class="">Start Date</label><input
                            name="start" id="start" type="date" class="form-control"></div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="end" class="">End Date</label><input
                            name="end" id="end" type="date" class="form-control"></div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="duration" class="">Duration</label><input
                            name="duration" id="duration" placeholder="Enter Course Duration" type="text"
                            class="form-control"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="timetable" class="">Timetable
                        </label><input name="timetable" id="timetable" type="text" class="form-control"
                            placeholder="Enter Course Timetable"></div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="fees" class="">Course Fees</label><input
                            name="fees" id="fees" type="text" placeholder="Enter Course Fees" class="form-control">
                    </div>
                </div>
            </div>
            <div class="divider mt-0" style="margin-bottom: 20px;"></div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="exam" class="">Exam</label><input name="exam"
                            id="exam" type="text" placeholder="Course Exam" class="form-control"></div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="examregfees" class="">Exam Register
                            Fees</label><input name="examregfees" placeholder="Enter Exam Register Fees"
                            id="examregfees" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="examfees" class="">Exam Fees</label><input
                            name="examfees" id="examfees" placeholder="Enter Exam Fees" type="text"
                            class="form-control"></div>
                </div>
            </div>
            <div class="position-relative form-group"><label for="note" class="">Note for Admin</label><input
                    name="note" id="note" placeholder="Enter Notes..." type="text" class="form-control">
            </div>

            <button class="mt-2 btn btn-primary">Add Course</button>
        </form>
    </div>
</div>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bs4-summernote@0.8.10/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.lecture-select').select2({
            theme: 'bootstrap4',
        });
        $('#summernote').summernote({
            placeholder: 'Write course descriptions ...',
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

    });
</script>

@endsection