@extends('layouts.master')

@section('content')
    <div class="container">
<!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-pen-alt"> </i>
                    </div>
                    <div>Student Detail Update
                        <div class="page-title-subheading">If you want to change the student detail then please specify the valid detail.
                        </div>
                    </div>
                </div> 
            </div>
        </div>
<!-- /.Page Main Title  -->

        <!-- card -->
        <div class="card">
            <div class="card-header ">
                <h3 class="card-title">Edit</h3>
            </div>
 
            <!-- update student details form -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                method="POST">
                @csrf
                <input type="hidden" name="id" value={{ $student_data['id'] }}>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="reg_no">Student Registration No</label>
                            <input type="text" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no"
                                id="reg_no" placeholder="Registration No." value="{{ $student_data['reg_no'] }}" autofocus
                                disabled>
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="name">Student Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" placeholder="Name" value="{{ $student_data['name'] }}" autofocus required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="course">Course</label>
                            <input type="text" class="form-control @error('course') is-invalid @enderror" name="course"
                                id="course" placeholder="Course" value="{{ $student_data['course'] }}" autofocus required>
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
                        <div class="form-group col-md-6">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                name="department" id="department" placeholder="Department"
                                value="{{ $student_data['department'] }}" autofocus required>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="session">Session</label>
                            <input type="text" class="form-control @error('session') is-invalid @enderror" name="session"
                                id="session" placeholder="Session" value="{{ $student_data['session'] }}" autofocus
                                required>
                            @error('session')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" placeholder="Full Address" value="{{ $student_data['address'] }}" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                id="contact" placeholder="Contact" value="{{ $student_data['contact'] }}" autofocus>
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class=" col-md-3">
                            <button type="submit" id="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.update student details form -->
        </div>
        <!-- /.card -->
    </div>

@endsection
