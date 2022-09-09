@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-dragon"> </i>
                    </div>
                    <div>Lost & Damage Books
                        <div class="page-title-subheading">If the books are lost or damage by the students or staff then you
                            can save the records in this field.
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

        <!-- Lost Damage Book -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Card -->
                <div class="card">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Lost & Damage Books</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="{{ $_SERVER['PHP_SELF'] }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="accno">Acc. No.</label>
                                    <input type="text" class="form-control  @error('accno') is-invalid @enderror"
                                        name="accno" value="{{ old('accno') }}" id="accno" placeholder="Book Acc. No."
                                        autofocus>
                                    @error('accno')
                                        <span class="invalid-feedback" role="alert"> 
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                        name="title" value="{{ old('title') }}" id="title" placeholder="Book Title"
                                        autofocus>
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror 
                                </div> 
                                <div class="form-group col-md-4">
                                    <label for="reg_no">Registration No</label>
                                    <input type="text" class="form-control @error('reg_no') is-invalid @enderror"
                                        name="reg_no" value="{{ old('reg_no') }}" id="reg_no"
                                        placeholder="Registration Number" autofocus>
                                    @error('reg_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                                
                                <div class="form-group col-md-6">
                                    <label for="member_type">Member Type</label>
                                    <select class="form-control @error('member_type') is-invalid @enderror"
                                        name="member_type" id="member_type" value="{{ old('member_type') }}" autofocus
                                        required>
                                        <option value="" selected>Select</option>
                                        <option value="Staff">Staff</option>
                                        <option value="Student">Student</option>
                                    </select>
                                    @error('member_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="department">Department</label>
                                    <input type="text" class="form-control @error('department') is-invalid @enderror"
                                        value="{{ old('department') }}" name="department" id="department"
                                        placeholder="Department" autofocus>
                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="book_condition">Book Condition</label>
                                    <select class="form-control @error('book_condition') is-invalid @enderror"
                                        name="book_condition" id="book_condition" value="{{ old('book_condition') }}"
                                        autofocus required>
                                        <option value="" selected>Select</option>
                                        <option value="Lost">Lost</option>
                                        <option value="Damage">Damage</option>
                                    </select>
                                    @error('book_condition')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fine">Fine</label>
                                    <input type="text" class="form-control @error('fine') is-invalid @enderror"
                                        value="{{ old('fine') }}" name="fine" id="fine" placeholder="Fine" autofocus>
                                    @error('fine')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-3">
                                    <button type="submit" id="submit" class="btn btn-block btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.Issue book -->
    </div>


@endsection
