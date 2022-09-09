@extends('layouts.master')

@section('content')

    <div class="container">

        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-history"> </i>
                    </div>
                    <div>History
                        <div class="page-title-subheading">You can view the history of the books that have been issued
                            to the student as well as staff till date.
                        </div>
                    </div>
                </div>
                <!-- search-box  -->
                <div class="page-title-actions">
                    <div class="d-inline-block ">
                        <form class="form-inline " role="search" method="GET" action="{{ $_SERVER['PHP_SELF'] }}">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" role="search" type="search" name='query'
                                    value="{{ request()->input('query') }}" placeholder="Search" aria-label="Search">
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

        <div class="divider mt-0" style="margin-bottom: 30px;"></div>

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

        <div class="col-md-12">
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-line nav">      
                <li class="nav-item">
                    <a role="tab" class="nav-link  delete_all" data-url="{{ url('delete-all-history') }}">
                        <span> Delete All </span>                              
                    </a>
                </li>
                &nbsp;                 
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-issue-books-csv') }}">
                        <span>Export to CSV</span> &nbsp;
                        <i class="fas fa-file-csv"> </i> 
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-issue-books-excel') }}">
                        <span>Export to EXCEL</span> &nbsp;
                        <i class="fas fa-file-excel"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <br>

        <!-- Issue Books History Table -->
        @if (isset($issue_books))
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">History</h5>
                        <table class="mb-0 table table-bordered table-responsive">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"> <input type="checkbox" id="master"></th>      
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
                                    <th scope="col" class="text-center">Status</th>
                                    <th scope="col">Action</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($issue_books) > 0)
                                    @foreach ($issue_books as $issue_book)
                                        <tr id="tr_{{ $issue_book->id }}">
                                            <td><input type="checkbox" class="sub_chk"  data-id="{{ $issue_book->id }}"> </td>
                                            <th scope="row">{{ $issue_book->issue_id }}</th>
                                            <td>{{ $issue_book->accno }}</td>
                                            <td>{{ $issue_book->title }}</td> 
                                            <td>{{ $issue_book->reg_no }}</td>
                                            <td>{{ $issue_book->name }}</td>
                                            <th scope="row">{{ $issue_book->member_type }}</th>
                                            <td>{{ $issue_book->department }}</td>
                                            <td>{{ $issue_book->issue_date }}</td>
                                            <td>{{ $issue_book->due_date }}</td>
                                            <td>{{ $issue_book->return_date }}</td>
                                            <td>{{ $issue_book->fine }}</td>                                          
                                            <td class="text-center">
                                                @if ($issue_book->return_date === null)
                                                <div class="badge badge-pill pl-2 pr-2 badge-danger">Pending</div>
                                                @else                                                
                                                    <div class="badge badge-pill pl-2 pr-2 badge-success">Return</div>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a class="delete-confirm"
                                                    href="{{ 'issueBookDelete/' . $issue_book->id }}"
                                                    data-toggle="tooltip" data-placement="left" title="Delete History">
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
                    <div class="pagination-block ml-4">
                        {{ $issue_books->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>
                </div>
            </div>
        @endif
        <!--  /.Issue Books History Table -->

    </div>

@endsection
