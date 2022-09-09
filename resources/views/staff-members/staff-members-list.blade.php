@extends('layouts.master')

@section('content')

    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fab fa-phoenix-squadron"> </i>
                    </div>
                    <div>Staff List
                        <div class="page-title-subheading">You can see the Staff member record by searching the Staff
                            Registration number,<br> Name and Department.
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
                    <a role="tab" class="nav-link  delete_all" data-url="{{ url('delete-all-staff') }}">
                        <span> Delete All </span>
                    </a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-staff-member-csv') }}">
                        <span>Export to CSV</span> &nbsp;
                        <i class="fas fa-file-csv"> </i>
                    </a>
                </li>
                <li class="nav-item">
                    <a role="tab" class="nav-link " href="{{ URL::to('/export-staff-member-excel') }}">
                        <span>Export to EXCEL</span> &nbsp;
                        <i class="fas fa-file-excel"> </i>
                    </a>
                </li>
            </ul>
        </div>
<br>

        <!-- staff member show table  -->
        @if (isset($staff_member))
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Staff Detail</h5>
                        <div class="table-responsive">
                        <table class="mb-0 table table-bordered  " id="">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col"> <input type="checkbox" id="master"></th>
                                    <th scope="col">Registration No</th>
                                    <th scope="col">Staff Member Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Registration Date</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($staff_member) > 0)
                                    @foreach ($staff_member as $staff_member_data_to_show)
                                        <tr id="tr_{{ $staff_member_data_to_show->id }}">
                                            <td><input type="checkbox" class="sub_chk" data-id="{{ $staff_member_data_to_show->id }}">
                                            </td>

                                            <th scope="row">{{ $staff_member_data_to_show->reg_no }}</th>
                                            <td>{{ $staff_member_data_to_show->staff_name }}</td>
                                            <td>{{ $staff_member_data_to_show->designation }}</td>
                                            <td>{{ $staff_member_data_to_show->department }}</td>
                                            <td>{{ $staff_member_data_to_show->registration_date }}</td>
                                            <td>{{ $staff_member_data_to_show->gender }}</td>
                                            <td>{{ $staff_member_data_to_show->address }}</td>
                                            <td>{{ $staff_member_data_to_show->contact }}</td>

                                            <td>
                                                <a href="{{ 'edit-staff-members/' . $staff_member_data_to_show->id }}" data-toggle="tooltip" data-placement="left" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a class="delete-confirm"
                                                    href="{{ 'delete-staff-members/' . $staff_member_data_to_show->id }}" data-toggle="tooltip" data-placement="left" title="Delete">
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
                        {{ $staff_member->appends(request()->input())->links('layouts.paginationlinks') }}
                    </div>
                </div>
            </div>
        @endif
        <!-- /.staff member show table  -->

    </div>

@endsection
