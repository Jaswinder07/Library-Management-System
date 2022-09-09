@extends('layouts.app')

@section('content')


    <div class="row justify-content-center mt-3 ">
        <div class=" col-md-6">
            <div class="card  card-primary">
                <div class="card-header bg-dark text-white text-center">
                    <h1> Register</h1>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="input-group mb-3">
                            <input id="name" type="text" placeholder="Full name"
                                class="form-control  @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="email" type="email" placeholder="Email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="input-group mb-3">
                            <input id="password" type="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" placeholder="Retype password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <div class="input-group mb-3">
                            <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender"
                                value="{{ old('gender') }}" autofocus required>
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

                        <div class="row">
                            <div class="col-8">

                            </div>
                            <!-- /.col -->

                            <div class="col-4">
                                <button type="submit" class="btn btn-dark btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>                   
                </div>
                <!-- /.form-box -->
                <div class="card-footer bg-dark">
                    <div class="container row justify-content-start ">
                        <div class="col-md-4" ">
                            <a href="login" class="text-center btn btn-light btn-block">Login</a>
                        </div>
                    </div>
                </div>
            </div><!-- /.card -->
        </div>
    </div>


@endsection
