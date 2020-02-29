@extends('backend.layout.app')
@section('dashboard-menu','mm-active')

@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-graph1 icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Overview Dashboard
            <div class="page-title-subheading">This is the page for overview all informations such as students ,courses
                ,lectures ,etc.
            </div>
        </div>
    </div>
    <div class="page-title-actions">
        <a href="javascript:void(0);" id="full-screen" class="nav-link" data-toggle="tooltip"
            title="Enter Desktop Full Screen" data-placement="bottom">
            <i class="fas fa-desktop"></i>&nbsp;
            Full Screen
        </a>
    </div>
</div>
@endsection

@section('main-content')

<div class="main-card mb-3 card">
    <div class="no-gutters row">
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-right ml-0 mr-3">
                        <div class="widget-numbers text-success">{{$users->count()}}</div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Students</div>
                        <div class="widget-subheading">Includes old students</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-right ml-0 mr-3">
                        <div class="widget-numbers text-warning">{{$lectures->count()}}</div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Lectures</div>
                        <div class="widget-subheading">All lectures from Y.E.C</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="widget-content">
                <div class="widget-content-wrapper">
                    <div class="widget-content-right ml-0 mr-3">
                        <div class="widget-numbers text-danger">{{$courses->count()}}</div>
                    </div>
                    <div class="widget-content-left">
                        <div class="widget-heading">Total Courses</div>
                        <div class="widget-subheading">Include all courses that have done</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="main-card mb-3 card">
            <ul class="list-group list-group-flush">
                @foreach($events->sortBy('start') as $event)
                <li class="list-group-item">
                    <div class="widget-content p-0">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">
                                        {{$event->name}}
                                    </div>
                                    <div class="widget-subheading">
                                        Upcoming Event
                                    </div>
                                </div>
                                <div class="widget-content-right">
                                    <a href="/event/detail/{{$event->id}}"
                                        class="mb-2 mr-2 badge badge-primary">Check</a>
                                </div>

                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-sub-label">
                                    <div class="sub-label-left">
                                        From : {{date('d-m-Y', strtotime($event->start))}}
                                    </div>
                                    <div class="sub-label-right">
                                        To : {{date('d-m-Y', strtotime($event->end))}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 card">
            <div class="card-body">
                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Birthday Notify</h6>
                <div class="scroll-area-sm">
                    <div class="scrollbar-container">
                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                            @foreach($users as $user)
                            @php
                            $userdob = $user->detail->dob->format('d M');
                            @endphp
                            @if($userdob == $today)
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <i class="metismenu-icon pe-7s-user pe-3x pe-va"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Today is <span
                                                    class="text-primary">{{$user->name}} </span>birthday
                                            </div>
                                            <a href="/student/detail/{{$user->id}}">
                                                <div class="widget-subheading">Click to see detail</div>
                                            </a>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="font-size-xlg text-muted">
                                                <span>{{$today}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @elseif($userdob == $dateToCompare)
                            <li class="list-group-item">
                                <div class="widget-content p-0">
                                    <div class="widget-content-wrapper">
                                        <div class="widget-content-left mr-3">
                                            <i class="metismenu-icon pe-7s-user pe-3x pe-va"></i>
                                        </div>
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Tomorrow is <span
                                                    class="text-primary">{{$user->name}} </span>birthday
                                            </div>
                                            <a href="/student/detail/{{$user->id}}">
                                                <div class="widget-subheading">Click to see detail</div>
                                            </a>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="font-size-xlg text-muted">
                                                <span>{{$dateToCompare}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @else
                            @endif
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection


@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $("#full-screen").on("click", function() {
            document.fullScreenElement && null !== document.fullScreenElement || !document
                .mozFullScreen && !document.webkitIsFullScreen ? document.documentElement
                .requestFullScreen ? document.documentElement.requestFullScreen() : document
                .documentElement.mozRequestFullScreen ? document.documentElement
                .mozRequestFullScreen() : document.documentElement.webkitRequestFullScreen && document
                .documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT) : document
                .cancelFullScreen ? document.cancelFullScreen() : document.mozCancelFullScreen ?
                document.mozCancelFullScreen() : document.webkitCancelFullScreen && document
                .webkitCancelFullScreen()
        });
    });
</script>
@endsection