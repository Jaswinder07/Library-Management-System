@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-graduation-cap"> </i>
                    </div>
                    <div>Students List
                        <div class="page-title-subheading">You can search the student record by searching the student
                            registration number,<br> name and course.
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
                                {{-- <input type="date" name="fromDate"> &nbsp; 
                                <input type="date" name="toDate"> &nbsp; --}}
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
            <div class="row justify-content-center col-md-12" id="session_alert">
                <div class="alert alert-success text-center col-md-10">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        @if (Session::get('fail'))
            <div class="row justify-content-center col-md-12" id="session_alert">
                <div class="alert alert-danger text-center col-md-10">
                    {{ Session::get('fail') }}
                </div>
            </div>
        @endif

        <div class="col-md-12 mb-3">
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-line nav">
                <li class="nav-item">
                    <a role="tab" class="nav-link  delete_all" data-url="{{ url('delete-all-student') }}">
                        <span> Delete All </span>
                    </a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-student-csv') }}">
                        <span>Export to CSV</span>&nbsp;
                        <i class="fas fa-file-csv"> </i>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-student-excel') }}">
                        <span>Export to Excel</span>&nbsp;
                        <i class="fas fa-file-excel"> </i>
                    </a>
                </li>
            </ul>
        </div>


        <!-- Student detail show table  -->
        @if (isset($students))
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-card mb-3 card">
                        <div class="card-body">
                            <h5 class="card-title">Student Detail</h5>
                            <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered table-striped " id="">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col"> <input type="checkbox" id="master"></th>
                                        <th scope="col">Registration No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Session</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Registration Date</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Contact</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody class="">
                                    @if (count($students) > 0)
                                        @foreach ($students as $student_data)
                                            <tr id="tr_{{ $student_data->id }}">
                                                <td><input type="checkbox" class="sub_chk"
                                                        data-id="{{ $student_data->id }}"> </td>
                                                        
                                                <th scope="row">{{ $student_data->reg_no }}</th>
                                                <td>{{ $student_data->name }}</td>
                                                <td>{{ $student_data->course }}</td>
                                                <td>{{ $student_data->year }}</td>
                                                <td>{{ $student_data->department }}</td>
                                                <td>{{ $student_data->session }}</td>
                                                <td>{{ $student_data->gender }}</td>
                                                <td>{{ $student_data->registration_date }}</td>
                                                <td>{{ $student_data->address }}</td>
                                                <td>{{ $student_data->contact }}</td>
                                                <td>
                                                    <a href="{{ 'editStudent/' . $student_data->id }}"
                                                        data-toggle="tooltip" data-placement="left" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="delete-confirm"
                                                        href="{{ 'deleteStudent/' . $student_data->id }}"
                                                        data-toggle="tooltip" data-placement="left" title="Delete">
                                                        <i class="far fa-trash-alt text-danger"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="text-danger col-sm">No result found!</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div class="divider mt-0" style="margin-bottom: 30px;"></div>

                        <div class="pagination-block ml-4">
                            {{ $students->appends(request()->input())->links('layouts.paginationlinks') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- /.student detail show table  -->
    </div>

@endsection
