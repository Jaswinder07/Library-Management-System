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
                    <div>Reports - Lost & Damage Books
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

        <div class="col-md-12">
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-line nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link  delete_all" data-url="{{ url('delete-all-reports') }}">
                        <span> Delete All </span>
                    </a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-report-csv') }}">
                        <span>Export to CSV</span> &nbsp;
                        <i class="fas fa-file-csv"> </i>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-report-excel') }}">
                        <span>Export to EXCEL</span> &nbsp;
                        <i class="fas fa-file-excel"> </i>
                    </a>
                </li>
            </ul>
        </div>
        <br>

        <!-- Lost Damage Book Reports Table  -->
        @if (isset($reports_lists))
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title"></h5> 
                        <div class="table-responsive">
                            <table class="mb-0 table" id="showbook">
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col"> <input type="checkbox" id="master"></th>
                                        <th scope="col">Acc. No</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Reg. No</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Member Type</th>
                                        <th scope="col">Book Condition</th>
                                        <th scope="col">Fine</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($reports_lists) > 0)
                                        @foreach ($reports_lists as $lost_damage_book_to_show)
                                            <tr id="tr_{{ $lost_damage_book_to_show->id }}">
                                                <td><input type="checkbox" class="sub_chk"
                                                        data-id="{{ $lost_damage_book_to_show->id }}"> </td>
                                                <td>{{ $lost_damage_book_to_show->accno }}</td>
                                                <td>{{ $lost_damage_book_to_show->title }}</td>
                                                <td>{{ $lost_damage_book_to_show->reg_no }}</td>
                                                <td>{{ $lost_damage_book_to_show->department }}</td>
                                                <td>{{ $lost_damage_book_to_show->member_type }}</td>
                                                <td>{{ $lost_damage_book_to_show->book_condition }}</td>
                                                <td>{{ $lost_damage_book_to_show->fine }}</td>
                                                <td>
                                                    <a class=""
                                                        href="{{ 'update-lost-damage-report/' . $lost_damage_book_to_show->id }}"
                                                        data-toggle="tooltip" data-placement="left" title="Change Reports">
                                                        <i class="far fa-edit "></i>
                                                    </a>
                                                    <a class="delete-confirm"
                                                        href="{{ 'delete-lost-damage-book-reports/' . $lost_damage_book_to_show->id }}"
                                                        data-toggle="tooltip" data-placement="left" title="Delete Reports">
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
                        {{ $reports_lists->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- /.Lost Damage Book Reports Table  -->

    </div>


@endsection
