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

        <script>
       
        </script>

        <!-- Card -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Book</h3>
            </div>

            <!-- Update-book-detail form -->
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"
                method="POST">
                @csrf
                <input type="hidden" name="id" value={{ $data['id'] }}>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <label for="accno">Book Acc. No</label>
                            <input type="text" class="form-control  @error('accno') is-invalid @enderror" name="accno"
                                id="accno" placeholder="Acc. No." autofocus value="{{ $data['accno'] }}" disabled>
                            @error('accno')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="title">Book Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                id="title" placeholder="Book Title" autofocus value="{{ $data['title'] }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="author">Author</label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                id="author" placeholder="Author" autofocus value="{{ $data['author'] }}">
                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-3">
                            <label for="publisher">Publisher</label>
                            <input type="text" class="form-control @error('publisher') is-invalid @enderror"
                                name="publisher" id="publisher" placeholder="Publisher" autofocus
                                value="{{ $data['publisher'] }}">
                            @error('publisher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-12">
                            <label for="edition">Edition</label>
                            <input type="text" class="form-control @error('edition') is-invalid @enderror" name="edition"
                                id="edition" placeholder="Edition" autofocus value="{{ $data['edition'] }}">
                            @error('edition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="quantity">No of copies</label>
                            <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                id="quantity" placeholder=">No of copies" autofocus value="{{ $data['quantity'] }}">
                            @error('quantity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="price">Price</label>
                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                                id="price" placeholder="Price" autofocus value="{{ $data['price'] }}">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                    </div>

                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <button type="submit" id="submit" class="btn save-confirm btn-block btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.update-book-detail form -->
        </div>
        <!-- /.card -->

    </div>

@endsection
