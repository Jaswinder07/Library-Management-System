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
                    <div>Update Detail
                        <div class="page-title-subheading">If you want to change the book detail then please specify the
                            valid detail.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Page Main Title  -->

        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Book</h3>
            </div>           

            <!-- Update-book-detail form -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                method="POST">
                @csrf 
                <input type="hidden" name="id" value={{ $show_report_data['id'] }}>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="accno">Book Acc. No</label>
                            <input type="text" class="form-control  @error('accno') is-invalid @enderror" name="accno"
                                id="accno" placeholder="Acc. No." autofocus value="{{ $show_report_data['accno'] }}" >
                            @error('accno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="title">Book Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Book Title" autofocus value="{{ $show_report_data['title'] }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="reg_no">Registration no</label>
                            <input type="text" class="form-control @error('reg_no') is-invalid @enderror" name="reg_no"
                                id="reg_no" placeholder="Registration no" autofocus value="{{ $show_report_data['reg_no'] }}">
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="department">Department</label>
                            <input type="text" class="form-control @error('department') is-invalid @enderror" name="department"
                                id="department" placeholder="Department" autofocus value="{{ $show_report_data['department'] }}">
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="member_type">Member Type</label>
                            <select class="form-control @error('member_type') is-invalid @enderror"
                                name="member_type" id="member_type" value="{{ $show_report_data['member_type'] }}"
                                autofocus required>
                                <option value="" selected>Select</option>
                                <option value="staff">Staff</option>
                                <option value="student">Student</option>
                            </select>
                            @error('member_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="book_condition">Book Condition</label>
                            <select class="form-control @error('book_condition') is-invalid @enderror"
                                name="book_condition" id="book_condition" value="{{ $show_report_data['book_condition'] }}"
                                autofocus required>
                                <option value="" selected>Select</option>
                                <option value="lost">Lost</option>
                                <option value="damage">Damage</option>
                            </select>
                            @error('book_condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="fine">Fine</label>
                            <input type="text" class="form-control @error('fine') is-invalid @enderror" name="fine"
                                id="fine" placeholder="Fine" autofocus value="{{ $show_report_data['fine'] }}">
                            @error('fine')
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
            <!-- /.update-book-detail form -->
        </div>
        <!-- /.card -->

    </div>

@endsection
