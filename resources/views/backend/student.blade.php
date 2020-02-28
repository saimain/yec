@extends('backend.layout.app')
@section('student-menu','mm-active')

@section('css')
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
<link type="text/css" rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

@endsection
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-users icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Student Managment
            <div class="page-title-subheading">This is the page for overview of students.
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Students Table</h5>
        <div class="divider mt-0" style="margin-bottom: 20px;"></div>

        <div class="">
            <table class="mb-0 table table-bordered table-hover table-responsive" id="student-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th style="min-width:150px !important;">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th style="min-width:100px !important;">Date of Birth</th>
                        <th>Company</th>
                        <th>Registed</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Company</th>
                        <th>Registed</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</>
                        <td>
                            {{$user->detail['phone']}}
                        </td>
                        <td>
                            {{date('d-m-Y', strtotime($user->detail['dob']))}}
                        </td>
                        <td>{{$user->detail['company']}}</td>
                        <td>

                            <a href="/student/detail/{{$user->id}}" class="mb-2 mr-2 btn btn-sm btn-info text-white"
                                data-id="{{$user->id}}">
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
        var table = $('#student-table').DataTable({

            "pagingType": "simple"
        });




    });
</script>
@endsection