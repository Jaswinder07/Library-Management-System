@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-registered"> </i>
                    </div>
                    <div>Student Registration
                        <div class="page-title-subheading">You can register the new students in the Library.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Page Main Title  -->
        @if (Session::get('success'))
            <div class="row justify-content-center " id="session_alert">
                <div class="alert alert-success text-center col-md-8">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        @if (Session::get('fail'))
            <div class="row justify-content-center " id="session_alert">
                <div class="alert alert-danger text-center col-md-8">
                    {{ Session::get('fail') }}
                </div>
            </div>
        @endif



        <!-- card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">New Student Registration</h3>
            </div>
            <!-- add student form  -->
            <form action="addStudent" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">                       

                        <div class="form-group col-md-3">
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Name" value="{{ old('name') }}" autofocus required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="course">Course</label>
                            <input type="text" class="form-control @error('course') is-invalid @enderror" name="course"
                                id="course" placeholder="Course" value="{{ old('course') }}" autofocus required>
                            @error('course')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="year">year</label>
                            <select class="form-control @error('year') is-invalid @enderror" name="year" id="year"
                                value="{{ old('year') }}" autofocus required>
                                <option value="" selected>Select Year</option>
                                <option value="First">First</option>
                                <option value="Second">Second</option>
                                <option value="Third">Third</option>
                                <option value="Fourth">Fourth</option>
                                <option value="Fifth">Fifth</option>
                                <option value="Final">Final</option>
                            </select>
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                name="department" id="department" placeholder="Department"
                                value="{{ old('department') }}" autofocus required>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="session">Session</label>
                            <input type="text" class="form-control @error('session') is-invalid @enderror" name="session"
                                id="session" placeholder="Session" value="{{ old('session') }}" autofocus required>
                            @error('session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender"
                                value="{{ old('gender') }}" autofocus required>
                                <option value="" selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>
                            </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" placeholder="Full Address" value="{{ old('address') }}" autofocus required>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                id="contact" placeholder="Contact" value="{{ old('contact') }}" autofocus required>
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <button type="submit" id="submit" class="btn btn-block btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.add student form  -->
        </div>
        <!-- /.card  -->
    </div>


@endsection
