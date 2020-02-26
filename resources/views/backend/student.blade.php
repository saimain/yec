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
        <h5 class="card-title">Table responsive</h5>
        <div class="divider mt-0" style="margin-bottom: 20px;"></div>

        <div class="">
            <table class="mb-0 table table-bordered" id="student-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Education</th>
                        <th>Registed</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Education</th>
                        <th>Registed</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($user_details as $user)
                    @php
                    $detail = App\Model\User\User::find($user->user_id)->user;
                    dd($detail)
                    @endphp
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$user->phone}}</td>
                        <td>{{$user->email}}</>
                        <td>

                        </td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$3,120</td>
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