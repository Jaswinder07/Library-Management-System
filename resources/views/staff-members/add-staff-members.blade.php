@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  --> 
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="far fa-registered"> </i>
                    </div>
                    <div>Staff Registration
                        <div class="page-title-subheading">You can register the new Staff Member in the Library.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Page Main Title  -->

        @if (Session::get('success'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-success text-center col-md-8">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-danger text-center col-md-8">
                    {{ Session::get('fail') }}
                </div>
            </div>
        @endif

        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Staff Member Registration</h3>
            </div>
            <!-- add staff member form -->
            <form action="add-staff-members" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                       

                        <div class="form-group col-md-4">
                            <label for="staff_name">Staff Member Name</label>
                            <input type="text" class="form-control @error('staff_name') is-invalid @enderror"
                                name="staff_name" id="staff_name" placeholder="Full Name" value="{{ old('staff_name') }}"
                                autofocus>
                            @error('staff_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                name="designation" id="designation" placeholder="Designation"
                                value="{{ old('designation') }}" autofocus>
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                name="department" id="department" placeholder="Department" value="{{ old('department') }}"
                                autofocus>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="gender">Gender</label>
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender"
                                value="{{ old('gender') }}" autofocus>
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
                                id="address" placeholder="Full Address" value="{{ old('address') }}" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                id="contact" placeholder="Contact" value="{{ old('contact') }}" autofocus>
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
            <!-- /.add staff member form -->
        </div>
        <!-- /.card -->
    </div>

@endsection
