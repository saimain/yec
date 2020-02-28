@extends('backend.layout.app')
@section('student-menu','mm-active')
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Student Detail Page
            <div class="page-title-subheading">This is the page for student details.
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
                    Student Details
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-eg5-0" class="active nav-link">Details</a>
                    </li>
                    <li class="nav-item">
                        <a data-toggle="tab" href="#tab-eg5-1" class="nav-link">Course</a>
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
                                        <h5 class="card-title">Personal Informations</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$user->name}}</li>
                                            <li class="list-group-item">{{$user->email}}</li>
                                            <li class="list-group-item">{{$user->detail->phone}}</li>
                                            <li class="list-group-item">{{$user->detail->dob}}</li>
                                            <li class="list-group-item">{{$user->detail->address}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="main-card mb-3 card shadow-none border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Details</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">{{$user->detail->education}}</li>
                                            <li class="list-group-item">{{$user->detail->company}}</li>
                                            <li class="list-group-item">{{$user->detail->role}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane" id="tab-eg5-1" role="tabpanel">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card shadow-none border-0">
                                <div class="card-body">
                                    <h5 class="card-title">Student Courses</h5>
                                    <ul class="list-group list-group-flush">
                                        @foreach($user_course as $i)
                                        <li class="list-group-item">
                                            <h5 class="list-group-item-heading">{{$i->name}}
                                                @if($i->status == 0)
                                                <div class="mb-2 mr-2 badge badge-pill badge-success">Running</div>
                                                @else
                                                <div class="mb-2 mr-2 badge badge-pill badge-secondary">Completed</div>
                                                @endif
                                            </h5>
                                            <p class="list-group-item-text">{{$i->description}}</p>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-eg5-2" role="tabpanel">
                        <form class="" action="/student/update/{{$user->id}}" method="post">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="name" class="">Name ( English
                                            )</label><input name="name" id="name" placeholder="Student Name" type="text"
                                            class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="email"
                                            class="">Email</label><input name="email" id="email"
                                            placeholder="Student Email" type="email" class="form-control"
                                            value="{{$user->email}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    @php

                                    @endphp
                                    <div class="position-relative form-group"><label for="password"
                                            class="">Password</label><input name="password" id="password"
                                            placeholder="Unable to change password" type="text" class="form-control"
                                            disabled>
                                    </div>
                                </div>

                            </div>
                            <blockquote class="text-muted">Above Informations will be able to login to student account.
                            </blockquote>
                            <div class="divider mt-0" style="margin-bottom: 20px;"></div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="phone"
                                            class="">Phone</label><input name="phone" id="phone"
                                            placeholder="Student Phone Number" value="{{$user->detail->phone}}"
                                            type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group"><label for="dob" class="">Date of
                                            Birth</label><input name="dob" id="dob" type="date" class="form-control"
                                            value="{{$user->detail->dob}}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="education"
                                            class="">Education</label><input name="education" id="education"
                                            placeholder="Student Education Level" type="text" class="form-control"
                                            value="{{$user->detail->education}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="company" class="">Company
                                            (Optional)</label><input name="company" id="company"
                                            placeholder="Student Company" value="{{$user->detail->company}}" type="text"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group"><label for="role" class="">Role
                                            (Optional)</label><input name="role" id="role" type="text"
                                            placeholder="Role at Company" value="{{$user->detail->role}}"
                                            class="form-control"></div>
                                </div>
                            </div>
                            <div class="position-relative form-group"><label for="address"
                                    class="">Address</label><input name="address" id="address"
                                    placeholder="Student Address" value="{{$user->detail->address}}" type="text"
                                    class="form-control">
                            </div>

                            <button class="mt-2 btn btn-primary">Update Student</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection