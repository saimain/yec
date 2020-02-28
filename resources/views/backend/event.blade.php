@extends('backend.layout.app')
@section('event-menu','mm-active')

@section('css')
<link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
<link type="text/css" rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

@endsection
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-date icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Event Managment
            <div class="page-title-subheading">This is the page for overview of events.
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Events Table</h5>
        <div class="divider mt-0" style="margin-bottom: 20px;"></div>

        <div class="">
            <table class="mb-0 table table-bordered table-hover table-responsive" id="event-table">
                <thead>
                    <tr>
                        <th style="min-width: 50px;">No.</th>
                        <th style="min-width: 310px;">Name</th>
                        <th style="min-width: 100px;">Start Date</th>
                        <th style="min-width: 100px;">End Date</th>
                        <th style="min-width: 100px;">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td>{{$event->name}}</td>
                        <td>{{$event->start}}</td>
                        <td>{{$event->end}}</>
                        <td>
                            @if($event->status == 0)
                            <div class="mb-2 mr-2 badge badge-info">Upcoming</div>
                            @else
                            <div class="mb-2 mr-2 badge badge-secondary">Passed</div>

                            @endif
                        </td>
                        <td>
                            <a href="/event/detail/{{$event->id}}" class="mb-2 mr-2 btn btn-sm btn-info text-white"
                                data-id="{{$event->id}}">
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
        var table = $('#event-table').DataTable({
            "pagingType": "simple"

        });




    });
</script>
@endsection