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
                    <div>Issue Books List
                        <div class="page-title-subheading">You can see the details of the books that have been issued and
                            which have not yet been returned.
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
                <div class="alert alert-success text-center col-md-6">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-danger text-center col-md-6">
                    {{ Session::get('fail') }}
                </div>
            </div>
        @endif

        @if (isset($issue_books))
        <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Issue Book Detail</h5>
                    <table class="mb-0 table table-bordered table-responsive">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Issue Id</th>
                                <th scope="col">Acc. No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Reg. No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Member Type</th>
                                <th scope="col">Department</th>
                                <th scope="col">Issue Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Return Date</th>
                                <th scope="col">Fine</th>
                                <th scope="col">Action</th>                
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($issue_books) > 0)
                            @foreach ($issue_books as $issue_book_data)
                                <tr>
                                    <th scope="row">{{ $issue_book_data->issue_id }}</th>
                                    <td>{{ $issue_book_data->accno }}</td>
                                    <td>{{ $issue_book_data->title }}</td>
                                    <td>{{ $issue_book_data->reg_no }}</td>
                                    <td>{{ $issue_book_data->name }}</td>
                                    <td>{{ $issue_book_data->member_type }}</td>
                                    <td>{{ $issue_book_data->department }}</td>
                                    <td>{{ $issue_book_data->issue_date }}</td>
                                    <td>{{ $issue_book_data->due_date }}</td>
                                    <td>{{ $issue_book_data->return_date }}</td>
                                    <td>{{ $issue_book_data->fine }}</td>
                                    <td>
                                        <a href="{{ 'returnBook/' . $issue_book_data->id }}"
                                            class="btn btn-primary" data-toggle="tooltip" data-placement="left"
                                            title="Return Book">
                                            Return
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
                <div class="pagination-block ml-4">
                    {{ $issue_books->appends(request()->input())->links('layouts.paginationlinks') }}
                </div>
            </div>
        </div>
    @endif


    </div>
    
@endsection