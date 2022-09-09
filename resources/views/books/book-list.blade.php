@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-list"> </i>
                    </div>
                    <div>Books List
                        <div class="page-title-subheading">You can search the book record by searching the books
                            AccNo ,<br> Title, Author, Publisher, Edition.
                        </div>
                    </div>
                </div>
                <!-- search-box  -->
                <div class="page-title-actions">
                    <div class="d-inline-block ">
                        <form class="form-inline " role="search" method="GET" action="{{ $_SERVER['PHP_SELF'] }}">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" role="search" type="search" name='query'
                                    value="{{ request()->input('query') }}" placeholder="Search here" aria-label="Search">
                                <span class="text-danger">@error('query'){{ $message }} @enderror</span>
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search mr-1"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.search-box  -->
            </div>
        </div>
        <!-- /.Page Main Title  -->

        @if (Session::get('success'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-success text-center col-md-10">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-danger text-center col-md-10">
                    {{ Session::get('fail') }}
                </div>
            </div>
        @endif       

        <div class="col-md-12">
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-line nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link  delete_all" data-url="{{ url('delete-all-books') }}">
                        <span> Delete All </span>   &nbsp;
                        <i class="fas fa-trash-alt"> </i>                 
                    </a>
                </li>
                                     
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-book-csv') }}">
                        <span>Export to CSV</span> &nbsp;
                        <i class="fas fa-file-csv"> </i>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-book-excel') }}">
                        <span>Export to EXCEL</span> &nbsp;
                        <i class="fas fa-file-excel"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <br>
       
        <!-- Book show Table -->
        @if (isset($books))
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body ">
                        <h5 class="card-title">Book Detail</h5>
                      <div class="table-responsive">
                        <table class="mb-0 table  table-bordered ">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"> <input type="checkbox" id="master"></th>              
                                    <th scope="col">Acc. No.</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Publisher</th>
                                    <th scope="col">Edition</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_filter"> 
                                @if (count($books) > 0)
                                    @foreach ($books as $book_data_to_show)
                                        <tr id="tr_{{ $book_data_to_show->id }}">
                                            <td><input type="checkbox" class="sub_chk"
                                                    data-id="{{ $book_data_to_show->id }}"> </td>
                                         
                                            <td>{{ $book_data_to_show->accno }}</td>
                                            <td>{{ $book_data_to_show->title }}</td>
                                            <td>{{ $book_data_to_show->author }}</td>
                                            <td>{{ $book_data_to_show->publisher }}</td>
                                            <td>{{ $book_data_to_show->edition }}</td>
                                            <td>{{ $book_data_to_show->quantity }}</td>
                                            <td>{{ $book_data_to_show->price }}</td>
                                            <td>
                                                <a href="{{ 'editBook/' . $book_data_to_show->id }}" data-toggle="tooltip" data-placement="left" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="delete-confirm"
                                                    href="{{ 'delete/' . $book_data_to_show->id }}" data-toggle="tooltip" data-placement="left" title="Delete">
                                                    <i class="far fa-trash-alt text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-danger">No result found!</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="pagination-block ml-4">
                        {{ $books->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- /.Book show Table -->


    </div>


@endsection
