@extends('backend.layout.app')
@section('course-menu','mm-active')

@section('css')
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
<link type="text/css" rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

@endsection
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Courses Managment
            <div class="page-title-subheading">This is the page for overview of courses.
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Courses Table</h5>
        <div class="divider mt-0" style="margin-bottom: 20px;"></div>

        <div class="">
            <table class="mb-0 table table-bordered table-hover table-responsive" id="student-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Duration</th>
                        <th>Fees</th>
                        <th>Lecture</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Start</th>
                        <th>End</th>
                        <th>Duration</th>
                        <th>Fees</th>
                        <th>Lecture</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($courses->sortBy('status') as $course)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$course->name}}</td>
                        <td> {{date('d-m-Y', strtotime($course->start))}}</td>
                        <td>
                            {{date('d-m-Y', strtotime($course->end))}}
                        </td>
                        <td>
                            {{$course->duration}}
                        </td>
                        <td>{{$course->fees}}</td>
                        <td>{{$course->lecture->name}}</td>
                        <td>
                            @if($course->status == 0)
                            <div class="mb-2 mr-2 badge badge-pill badge-success">Running</div>
                            @else
                            <div class="mb-2 mr-2 badge badge-pill badge-secondary">Complete</div>
                            @endif
                        </td>
                        <td>

                            <a href="/course/detail/{{$course->id}}" class="mb-2 mr-2 btn btn-sm btn-info text-white"
                                data-id="{{$course->id}}">
                                Check
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@section('js')
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        var table = $('#student-table').DataTable();




    });
</script>
@endsection