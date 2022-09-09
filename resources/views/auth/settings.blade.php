@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fa fa-plus"> </i>
                    </div>
                    <div>Librarian Registration
                        <div class="page-title-subheading">You can register the new Librarian that will got all the
                            permissions.
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link active" href="#" id="admin_list_button">
                    <span>View List</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link " href="#" id="admin_registration_button">
                    <span>New Registration</span>
                </a>
            </li>            
        </ul>

        @if (Session::get('success'))
            <div class="row justify-content-center" id="session_alert">
                <div class="alert alert-success text-center col-md-6">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        @if (Session::get('fail'))
            <script>
                swal("Sorry!", "The cureent user is not remove.", "info")

            </script>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <form method="POST" action="settings" id="admin_registration_form">
                        <div class="card-header">
                            <h3 class="card-title">Registration</h3>
                        </div>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        id="name" placeholder="Full name" value="{{ old('name') }}" autofocus required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Email" value="{{ old('email') }}" autofocus
                                        required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="designation">Designation</label>
                                    <input type="text" class="form-control @error('designation') is-invalid @enderror"
                                        name="designation" id="designation" placeholder="Designation"
                                        value="{{ old('designation') }}" autofocus required>
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="dob">Date of Birth</label>
                                    <input id="dob" type="date" placeholder="Date of Birth"
                                        class="form-control @error('dob') is-invalid @enderror" name="dob"
                                        value="{{ old('dob') }}" required autocomplete="dob">
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="gender">Gender</label>
                                    <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                        id="gender" value="{{ old('gender') }}" autofocus required>
                                        <option value="" selected>Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Transgender">Transgender</option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        name="address" id="address" placeholder="Full Address"
                                        value="{{ old('address') }}" autofocus required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="contact">Contact</label>
                                    <input type="text" class="form-control @error('contact') is-invalid @enderror"
                                        name="contact" id="contact" placeholder="Contact" value="{{ old('contact') }}"
                                        autofocus required>
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-md-3">
                                    <button type="submit" id="submit" class="btn btn-block btn-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" id="admin_list">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                      <div class="card-header">
                        <h5 class="card-title">Librarian Detail</h5>
                      </div>                      
                        <table class="mb-0 table table-responsive-lg table-bordered">
                            <thead class="table-dark ">
                                <tr>                                   
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Date of Birth</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>                                
                                    <th scope="col" class="text-center ">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user_detail_to_show)
                                    <tr>                                       
                                        <td>{{ $user_detail_to_show['name'] }}</td>
                                        <td>{{ $user_detail_to_show['email'] }}</td>
                                        <td>{{ $user_detail_to_show['designation'] }}</td>                                    
                                        <td>{{ $user_detail_to_show['dob'] }}</td>
                                        <td>{{ $user_detail_to_show['gender'] }}</td>
                                        <td>{{ $user_detail_to_show['address'] }}</td>
                                        <td>{{ $user_detail_to_show['contact'] }}</td>
                                        <td class="text-center">
                                            <a class="delete-confirm"
                                                href="{{ 'deleteAdmin/' . $user_detail_to_show['id'] }}"data-toggle="tooltip" data-placement="left" title="Delete">
                                                <i class="far fa-trash-alt text-danger"> </i>
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
@endsection
