@extends('backend.layout.app')
@section('event-menu','mm-active')

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
            <i class="pe-7s-date icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Event Detail Page
            <div class="page-title-subheading">This is the page for event details.
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 card">
            <div class="card-header-tab card-header bg-white">
                <div class="card-header-title">
                    <i class="header-icon lnr-bicycle icon-gradient bg-love-kiss">
                    </i>
                    Event Details
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-eg5-0" class="active nav-link">Details</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-eg5-2" class="nav-link">Setting</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-eg5-0" role="tabpanel">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="main-card mb-3 card shadow-none border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Event Informations</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$event->name}}
                                                @if($event->status == 0)
                                                <div class="mb-2 mr-2 badge badge-primary">Upcoming Event</div>
                                                @else
                                                <div class="mb-2 mr-2 badge badge-secondary">Passed Event</div>
                                                @endif
                                            </li>
                                            <li class="list-group-item">Event start at : {{$event->start}}</li>
                                            <li class="list-group-item">Event end at : {{$event->end}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                        <form class="" action="/event/update/{{$event->id}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12">
                                    <div class="position-relative form-group"><label for="name"
                                            class="">Event</label><input name="name" id="name" placeholder="Enter Event"
                                            type="text" class="form-control" value="{{$event->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="start" class="">Start
                                            Date</label><input name="start" id="start" placeholder="Enter Start Date"
                                            type="date" class="form-control" value="{{$event->start}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="end" class="">End
                                            Date</label><input name="end" id="end" placeholder="Enter End Date"
                                            type="date" class="form-control" value="{{$event->end}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="">Select Status</label>
                                    <div class="position-relative form-group">
                                        <select class="mb-2 form-control event-select" id="status" name="status">
                                            <option selected value="{{$event->status}}">
                                                @if($event->status == 0)
                                                Upcoming Event
                                                @else
                                                Passed Event
                                                @endif
                                            </option>
                                            <option value="0">Upcoming Event</option>
                                            <option value="1">Passed Event</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button class="mt-2 btn btn-primary">Add Event</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

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
        $('.event-select').select2({
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