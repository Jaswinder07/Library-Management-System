@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-undo"> </i>
                    </div>
                    <div>Renew Book
                        <div class="page-title-subheading">You can renew book to the student as well as staff members
                            after click on Renew
                            Button.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Page Main Title  -->

        <!-- Renew Book form -->
        <div class="card ">
            <div class="card-header">
                <h3 class="card-title">Renew </h3>
            </div>
            <form action="{{ $_SERVER['PHP_SELF'] }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">

                        <input type="hidden" name="id" value={{ $renew_book_data->id }}>

                        
                        <div class="form-group col-md-4">
                            <label for="issue_id">Issue Id</label>
                            <input type="text" class="form-control  @error('issue_id') is-invalid @enderror" name="issue_id"
                                value="{{ $renew_book_data->issue_id }}" id="issue_id" placeholder="Issue Id" autofocus
                                disabled>
                            @error('issue_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="accno">Acc. No.</label>
                            <input type="text" class="form-control  @error('accno') is-invalid @enderror" name="accno"
                                value="{{ $renew_book_data->accno }}" id="accno" placeholder="Book Acc. No." autofocus
                                disabled>
                            @error('accno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="reg_no">Registration No</label>
                            <input type="text" class="form-control @error('reg_no') is-invalid @enderror"
                                name="reg_no" value="{{ $renew_book_data->reg_no }}"
                                id="reg_no" placeholder="Registration No" autofocus disabled>
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-grissue_dateoup col-md-6">
                            <label for="issue_date">Issue Date </label>
                            <input type="text" class="form-control @error('issue_date') is-invalid @enderror"
                                name="issue_date" value="{{ $renew_book_data->issue_date }}" id="issue_date"
                                placeholder="Issue Date" autofocus disabled>
                            @error('issue_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-grissue_dateoup col-md-6">
                            <label for="due_date">Due Date </label>
                            <input type="text" class="form-control @error('due_date') is-invalid @enderror" name="due_date"
                                value="{{ $renew_book_data->due_date }}" id="due_date" placeholder="Due Date" autofocus
                                disabled>
                            @error('due_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     
                        <div class="form-group col-md-6 mt-3">
                            <label for="fine">New Fine</label>
                            <input type="text" class="form-control @error('fine') is-invalid @enderror" name="fine"
                                 id="fine" placeholder="Fine" autofocus>
                            @error('fine')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 mt-3">
                            <label for="fine">Old Fine</label>
                            <div class="alert alert-success ">{{$old_fine}}</div>
                        </div>                        
                    </div>
                    <div class="row justify-content-end mt-3">
                        <div class="col-md-3">
                            <button type="submit" id="submit" class="btn btn-block btn-primary">Renew</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
        <!-- /.Return Book form -->
    </div>

@endsection
