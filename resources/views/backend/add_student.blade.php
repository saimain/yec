@extends('backend.layout.app')
@section('student-menu','mm-active')
@section('page-title')

<div class="page-title-wrapper">
    <div class="page-title-heading">
        <div class="page-title-icon">
            <i class="pe-7s-add-user icon-gradient bg-mean-fruit">
            </i>
        </div>
        <div>Add New Student
            <div class="page-title-subheading">This is the page for add a student.
            </div>
        </div>
    </div>
</div>
@endsection

@section('main-content')

<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">New Student Informations</h5>
        <form class="" action="/students/add" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="name" class="">Name ( English )</label><input
                            name="name" id="name" placeholder="Student Name" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="email" class=""></labe>Email
                            (Optional)</label>
                        <input name="email" id="email" placeholder="Student Email" type="email" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="password" class="">Password</label><input
                            name="password" id="password" placeholder="New Password" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="password-confirm" class="">Confrim
                            Password</label>
                        <input id="password-confirm" class="form-control" name="password_confirmation"
                            autocomplete="new-password" placeholder="Confirm Password" type="text">
                    </div>
                </div>
            </div>
            <blockquote class="text-muted">Above Informations will be able to login to student account.</blockquote>
            <div class="divider mt-0" style="margin-bottom: 20px;"></div>
            <div class="form-row">
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="phone" class="">Phone</label><input
                            name="phone" id="phone" placeholder="Student Phone Number" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="position-relative form-group"><label for="dob" class="">Date of
                            Birth</label><input name="dob" id="dob" type="date" class="form-control"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="education" class="">Education</label><input
                            name="education" id="education" placeholder="Student Education Level" type="text"
                            class="form-control"></div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="company" class="">Company
                            (Optional)</label><input name="company" id="company" placeholder="Student Company"
                            type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="position-relative form-group"><label for="role" class="">Role (Optional)</label><input
                            name="role" id="role" type="text" placeholder="Role at Company" class="form-control"></div>
                </div>
            </div>
            <div class="position-relative form-group"><label for="address" class="">Address</label><input name="address"
                    id="address" placeholder="Student Address" type="text" class="form-control">
            </div>

            <button class="mt-2 btn btn-primary">Add Student</button>
        </form>
    </div>
</div>
@endsection