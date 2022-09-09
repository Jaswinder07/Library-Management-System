@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-book"> </i>
                    </div>
                    <div>Add Books
                        <div class="page-title-subheading">You can add the books in the Library Database.
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

        <!-- card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Please fill the details are carefully </h3>
            </div>

            <!-- Add Book form -->
            <form action="addbook" method="POST" id="addbook">
                @csrf
                <!-- Card-body -->
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="accno">Acc. No.</label>
                            <input type="text" class="form-control  @error('accno') is-invalid @enderror" name="accno"
                                value="{{ old('accno') }}" id="accno" placeholder="Acc. No." autofocus required>
                            @error('accno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="title">Book Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                value="{{ old('title') }}" id="title" placeholder="Book Title" autofocus>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                value="{{ old('author') }}" id="author" placeholder="Author" autofocus>
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                value="{{ old('publisher') }}" name="publisher" id="publisher" placeholder="Publisher"
                                autofocus>
                            @error('publisher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edition">Edition</label>
                            <input type="text" class="form-control @error('edition') is-invalid @enderror" name="edition"
                                value="{{ old('edition') }}" id="edition" placeholder="Edition" autofocus>
                            @error('edition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="quantity">No of Copies</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                value="{{ old('quantity') }}" id="quantity" placeholder="No of copies" autofocus>
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') }}" id="price" placeholder="Price" autofocus>
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row justify-content-end ">
                        <div class="col-md-3">
                            <button type="submit" id="submit" class="btn btn-block btn-primary ">Submit</button>
                        </div>
                    </div>

                </div>
                <!-- /.Card-body -->
            </form>
            <!-- /.Add book form -->
        </div>
        <!-- /.card -->


    </div>

    <script>

    </script>

@endsection
