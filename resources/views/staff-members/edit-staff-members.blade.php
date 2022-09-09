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
                    <div>Staff Detail Update
                        <div class="page-title-subheading">If you want to change the staff member detail then please specify
                            the valid detail.
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <!-- /.Page Main Title  -->
 
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit</h3>
            </div>
            <!-- Update to staff member form -->
            <form action="edit-staff-members" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $staff_member_data['id'] }}">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label for="reg_no">Staff Registratio No</label>
                            <input type="text" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no"
                                id="reg_no" placeholder="Teacher Registration No."
                                value="{{ $staff_member_data['reg_no'] }}" autofocus disabled>
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="staff_name">Staff Member Name</label>
                            <input type="text" class="form-control @error('staff_name') is-invalid @enderror"
                                name="staff_name" id="staff_name" placeholder="Full Name"
                                value="{{ $staff_member_data['staff_name'] }}" autofocus>
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
                                value="{{ $staff_member_data['designation'] }}" autofocus>
                            @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror"
                                name="department" id="department" placeholder="Department"
                                value="{{ $staff_member_data['department'] }}" autofocus>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                id="address" placeholder="Full Address" value="{{ $staff_member_data['address'] }}" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="contact">Contact</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" name="contact"
                                id="contact" placeholder="Contact" value="{{ $staff_member_data['contact'] }}" autofocus>
                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <button type="submit" id="submit" class="btn btn-block btn-primary">Save</button>
                        </div>
                    </div>

                </div>
            </form>
            <!-- /. update to staff member form -->
        </div>
        <!-- /.card -->
    </div>


@endsection
