@extends('layouts.master')

@section('content')

    <div class="container emp-profile">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        {{-- <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog"
                            alt="" />
                        <div class="file btn btn-lg btn-primary">
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h6>
                            {{ Auth::user()->name }}
                        </h6>
                        <p class="proile-rating"> <span></span></p>
                        <br><br><br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab"
                                    aria-controls="about" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Personal Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
                @if (Session::get('success'))
                    <div class="row justify-content-center" id="session_alert">
                        <div class="alert alert-success text-center col-md-6">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                @endif
                <div class="col-md-2">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a href="/edit-Profile" role="tab" class="nav-link ">
                                <span>Edit Profile</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">                                           
                        {{-- <p>WORK LINK</p>
                        <a href="">Website Link</a><br />
                        <a href="">Bootsnipp Profile</a><br />
                        <a href="">Bootply Profile</a>                 --}}
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>User Id</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->id }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Designation</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->designation }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Gender</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->gender }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Date of Birth</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->dob }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Address</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->address }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Contact</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ Auth::user()->contact }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
