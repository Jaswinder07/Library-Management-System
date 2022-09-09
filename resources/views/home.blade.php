@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="app-page-title" id="home">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-home"> </i>
                    </div>
                    <div>Home Page
                        <div class="page-title-subheading">This is a home page, on this page you can see all the details and
                            you can do work on it.
                        </div>
                    </div>
                </div>
                <div class="page-title-actions">
                    <div class="d-inline-block dropdown">
                        <form id="search" class="form-inline mb-3" role="search" method="GET"
                            action="{{ $_SERVER['PHP_SELF'] }}">
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
            </div>
        </div>


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

        <!-- Main Row -->
        <div class="row">
            <!-- Date -->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Date</div>
                            <div class="widget-subheading">Today</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-success"><span>{{ $current_date }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Date -->

            <!-- Registered Student -->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Student</div>
                            <div class="widget-subheading">Total Registered</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><span>{{ $total_student_count }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.Registered Student -->

            <!-- Registered Staff Member -->
            <div class="col-lg-6 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-wrapper">
                        <div class="widget-content-left">
                            <div class="widget-heading">Staff Member</div>
                            <div class="widget-subheading">Total Registered</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-danger"><span>{{ $total_staff_members_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  /.Registered Staff Member -->
        </div>

        @if (isset($return_books_to_shows))
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div>
                        <h5 class="menu-header-title text-capitalize text-primary"><strong>RETURN BOOKS</strong>
                        </h5>
                    </div>
                   
                </div>
                <div class="table-responsive">
                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Issue Id</th>
                                <th class="text-left">Acc No</th>
                                <th>Registration No</th>
                                <th class="text-left">Issue Date</th>
                                <th class="text-left">Due Date</th>
                                <th class="">Return Date</th>
                                <th class="text-left">Fine</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($return_books_to_shows) > 0)
                                @foreach ($return_books_to_shows as $return_books_to_show)
                                    <tr>
                                        <td class="text-center text-muted">{{ $return_books_to_show->issue_id }}</td>
                                        <td class="text-left">
                                            {{ $return_books_to_show->accno }}
                                        </td>
                                        <td>
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left flex2">
                                                        <div class="widget-heading">{{ $return_books_to_show->name }}
                                                        </div>
                                                        <div class="widget-subheading opacity-7">
                                                            {{ $return_books_to_show->reg_no }}</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-left text-muted">
                                            {{ $return_books_to_show->issue_date }}
                                        </td>
                                        <td class="text-left">
                                            {{ $return_books_to_show->due_date }}
                                        </td>
                                        <td>
                                            {{ $return_books_to_show->return_date }}
                                        </td>
                                        <td>
                                            {{ $return_books_to_show->fine }}
                                        </td>
                                        <td class="text-center">
                                            @if ($return_books_to_show->return_date === null)
                                                <div class="badge badge-pill pl-2 pr-2 badge-danger">Pending</div>
                                            @else
                                                <div class="badge badge-pill pl-2 pr-2 badge-success">Return</div>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ 'returnBook/' . $return_books_to_show->id }}"
                                                class="btn btn-light" data-toggle="tooltip" data-placement="left" title="Return Book">
                                                <i class="fas fa-arrow-alt-circle-left"></i>
                                            </a>
                                            <a href="{{ 'renew-book/' . $return_books_to_show->id }}"
                                                class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Renew Book">
                                                <i class="fas fa-arrow-alt-circle-right"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-danger text-center">No result found!</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="d-block clearfix card-footer">
                    <div class="float-left pagination-block mt-2 ">
                        {{ $return_books_to_shows->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>
                    <div class="float-right mt-2">
                        <a href="/history" class="btn-wide btn-shadow btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
            </div>
        @endif

        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>

        <!--  Return Books Due for Today -->
        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Books</div>
                                <div class="widget-subheading">Due at Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-success">{{ $due_books_today_count }}</div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-xs progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="65" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                            <div class="progress-sub-label justify-content-center">
                                <div class="sub-label-left">
                                    {{ $current_date }}
                                </div>
                                <div class="sub-label-right">
                                    <a href="#due-for-today" class="nav-link" data-toggle="tooltip" data-placement="top"
                                        title="More info">
                                        More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  /.Return Books Due for Today -->

            <!--  Books Returned at Today -->
            <div class="col-lg-4 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Books</div>
                                <div class="widget-subheading">Returned at Today</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-warning">
                                    {{ $returned_books_today_count }}
                                </div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-xs progress-bar-animated-alt progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 100%;">
                                </div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">
                                    {{ $current_date }}
                                </div>
                                <div class="sub-label-right">
                                    <a href="#returned-today-list" id="returned_today_btn" class="nav-link"
                                        data-toggle="tooltip" data-placement="top" title="More info">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  /.Books Returned at Today -->

            <!--  Books Not Return till now -->
            <div class="col-lg-4 col-xl-4">
                <div class="card mb-3 widget-content">
                    <div class="widget-content-outer">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="widget-heading">Books</div>
                                <div class="widget-subheading">Not Return Till Now</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-danger"> {{ $not_return_book_counts }} </div>
                            </div>
                        </div>
                        <div class="widget-progress-wrapper">
                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="65" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                            <div class="progress-sub-label">
                                <div class="sub-label-left">
                                    {{ $current_date }}
                                </div>
                                <div class="sub-label-right">
                                    <a href="#not-return-list" id="href-btn" class="nav-link scrollto" data-toggle="tooltip"
                                        data-placement="top" title="More info">More info
                                        <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  /.Books Not Return till now -->
        </div>

        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>

        <div class="row">
            <div class="col-lg-4 col-xl-6">
                <div class="card mb-3 widget-content bg-night-fade">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Books</div>
                            <div class="widget-subheading">Total</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $total_books_count }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-6">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Issue Books</div>
                            <div class="widget-subheading">Total</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span>{{ $total_issue_book_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-12">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Fine</div>
                            <div class="widget-subheading">Total</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span>${{ $total_fine }}</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-card mb-3 card">
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Lost Books</div>
                                    <div class="widget-subheading">Total</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-success">{{ $total_lost_books }}</div>
                                </div>
                            </div>

                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="43"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                </div>
                                <div class="progress-sub-label justify-content-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Damage Books</div>
                                    <div class="widget-subheading">Total</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-primary">{{ $total_damage_books }}</div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="47"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-4">
                    <div class="widget-content">
                        <div class="widget-content-outer">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Lost & Damage Books</div>
                                    <div class="widget-subheading">Total Fine </div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning">${{ $total_fine_lost_damage_books }}</div>
                                </div>
                            </div>
                            <div class="widget-progress-wrapper">
                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="77"
                                        aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>


        <div class="main-card mb-3 card col-md-12 " id="not-return-list">
            <div class="card-header border-primary  ">
                <h4 class="card-title"><b>Books Not Return Till Now</b></h4>
            </div>
            <div class="card-body table-responsive">
                <div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 text-right">
                            <div>
                                <label><input type="search" id="search-not-return-book" class="form-control "
                                        placeholder="Type here to search">
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row scroll-area-md">
                        <div class="col-sm-12 scrollbar-container ps--active-y ps">
                            <table class="table table-hover table-striped table-bordered  ">
                                <thead class="table-success">
                                    <tr role="row">
                                        <th scope="col">Issue Id</th>
                                        <th scope="col">Acc. No</th>
                                        <th scope="col">Reg. No</th>
                                        <th scope="col">Member Type</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Issue Date</th>
                                        <th scope="col">Due Date</th>
                                        <th scope="col">Return Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="search-not-return-table">
                                    @foreach ($not_return_book_lists as $not_return_list)
                                        <tr>
                                            <th scope="row">{{ $not_return_list->issue_id }}</th>
                                            <td>{{ $not_return_list->accno }}</td>
                                            <td>{{ $not_return_list->reg_no }}</td>
                                            <td>{{ $not_return_list->member_type }}</td>
                                            <td>{{ $not_return_list->department }}</td>
                                            <td>{{ $not_return_list->issue_date }}</td>
                                            <td>{{ $not_return_list->due_date }}</td>
                                            <td>{{ $not_return_list->return_date }}</td>
                                            <td>
                                                <a href="{{ 'returnBook/' . $not_return_list->id }}" class="  nav-link "
                                                    data-toggle="tooltip" data-placement="left" title="Return Book">
                                                    <i class="fas fa-undo" </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>


        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div id="due-for-today" class="main-card mb-3 card ">
                    <div class="card-header border-primary  ">
                        <h4 class="card-title"><b>Books Due at Today</b></h4>
                    </div>
                    <div class="card-body table-responsive">
                        <div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 text-right">
                                    <div>
                                        <label><input type="search" id="search-book-due-today-filter" class="form-control "
                                                placeholder="Type here to search">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row scroll-area-md">
                                <div class="col-sm-12 scrollbar-container ps--active-y ps">
                                    <table class="table table-hover table-striped table-bordered  ">
                                        <thead class="table-success">
                                            <tr role="row">
                                                <th scope="col">Issue Id</th>
                                                <th scope="col">Acc. No</th>
                                                <th scope="col">Reg. No</th>
                                                <th scope="col">Department</th>
                                                <th scope="col">Issue Date</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-book-due-today-table">
                                            @foreach ($due_today_lists as $due_today_list)
                                                <tr>
                                                    <th id="search-text" scope="row">{{ $due_today_list->issue_id }}</th>
                                                    <td id="search-text">{{ $due_today_list->accno }}</td>
                                                    <td id="search-text">{{ $due_today_list->reg_no }}</td>
                                                    <td id="search-text">{{ $due_today_list->department }}</td>
                                                    <td>{{ $due_today_list->issue_date }}</td>
                                                    <td>{{ $due_today_list->due_date }}</td>
                                                    <td class="text-center">
                                                        <a href="{{ 'returnBook/' . $due_today_list->id }}"
                                                            data-toggle="tooltip" data-placement="left" title="Return Book">
                                                            <i class="fas fa-edit"> </i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6">
                <div id="returned-today-list" class="main-card mb-3 card  ">
                    <div class="card-header border-primary  ">
                        <h4 class="card-title"><b>Books Returned at Today</b></h4>
                    </div>
                    <div class="card-body table-responsive">
                        <div>
                            <div class="row">
                                <div class="col-sm-12 col-md-12 text-right">
                                    <div>
                                        <label><input type="search" id="search-book-return-today-filter" class="form-control "
                                                placeholder="Type here to search">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row scroll-area-md">
                                <div class="col-sm-12 scrollbar-container ps--active-y ps">
                                    <table class="table table-hover table-striped table-bordered  ">
                                        <thead class="table-success">
                                            <tr role="row">
                                                <th scope="col">Issue Id</th>
                                                <th scope="col">Acc. No</th>
                                                <th scope="col">Reg. No</th>
                                                <th scope="col">Member Type</th>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Return Date</th>
                                                <th scope="col">Fine</th>
                                            </tr>
                                        </thead>
                                        <tbody id="search-book-return-today-table">
                                            @foreach ($return_book_today_lists as $return_today_list)
                                                <tr>
                                                    <th scope="row">{{ $return_today_list->issue_id }}</th>
                                                    <td>{{ $return_today_list->accno }}</td>
                                                    <td>{{ $return_today_list->reg_no }}</td>
                                                    <td>{{ $return_today_list->member_type }}</td>
                                                    <td>{{ $return_today_list->due_date }}</td>
                                                    <td>{{ $return_today_list->return_date }}</td>
                                                    <td>{{ $return_today_list->fine }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>


        <style>
            .vl {
                border-left: 3px solid rgb(18, 236, 225);
                height: 50px;
            }

        </style>
        <!--  Notes -->
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card-hover-shadow-2x mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <h6 class="text-muted text-uppercase font-size-lg opacity-7 mt-2 font-weight-normal">
                                <strong> Notes </strong>
                            </h6>
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container ps ps--active-y">
                            <div class="p-2">
                                <ul class=" list-group list-group-flush">
                                    @foreach ($get_notes as $get_notes)
                                        <li class="list-group-item">
                                            <div class="widget-content p-0">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left mr-4">
                                                        {{-- {{ $get_notes->id }} --}}
                                                        <div class="vl"></div>
                                                    </div>
                                                    <div class="widget-content-left">
                                                        <div class="widget-heading">{{ $get_notes->subject }}
                                                            <div class="badge badge-info ml-2">{{ $get_notes->date }}
                                                            </div>
                                                        </div>
                                                        <div class="widget-subheading">
                                                            <i>{{ $get_notes->message }}</i>
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right widget-content-actions">
                                                        {{-- <button class="border-0 btn-transition btn btn-outline-success">
                                                            <i class="fa fa-check"></i> --}}
                                                        </button>
                                                        <a href="{{ 'delete-to-notes/' . $get_notes->id }}"
                                                            class="border-0 btn-transition btn btn-outline-danger">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-right card-footer">
                        {{-- <button class="mr-2 btn btn-primary ">Delete</button>
                        <button class="btn btn-primary">Add Task</button> --}}
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-lg-6">
                <form id="add-notes" action="{{ $_SERVER['PHP_SELF'] }}" method="POST">
                    @csrf
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h6 class="text-muted text-uppercase font-size-lg opacity-7 mb-4 font-weight-normal">
                                <strong>Add to Notes</strong>
                            </h6>
                            <div class="row justify-content-center">
                                <div id="alert-success"
                                    class="alert alert-success rounde alert-notes  col-md-11 text-center">
                                    <h6 class="text-muted text-uppercase font-size-md opacity-7 mb-3 font-weight-normal">
                                        Notes successfully added
                                    </h6>
                                </div>
                                <div id="alert-fail" class="alert alert-warning rounde alert-notes  col-md-11 text-center">
                                    <h6 class="text-muted text-uppercase font-size-md opacity-7 mb-3 font-weight-normal">
                                        There is a Problem to add this notes. Please try again.
                                    </h6>
                                </div>
                            </div>
                            <div class="border-light card-border scroll-area-sm card">
                                <div class=" mb-4">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        name="subject" id="subject" placeholder="Subject" value="{{ old('subject') }}">
                                    @error('subject')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                        placeholder="Leave a comment here" value="{{ old('message') }}"
                                        style="height: 136px"></textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-block text-right card-footer">
                            <button type="submit" class="btn btn-dark">Add Notes</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <!--  /.Notes -->

        <div class="divider mt-0 " style="margin-bottom: 30px;"></div>


    </div>



@endsection
