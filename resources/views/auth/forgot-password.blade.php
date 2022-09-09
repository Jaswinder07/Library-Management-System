@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="login-box col-md-6">
                <div class="card card-outline card-primary">
                    <div class="card-header bg-dark text-white text-center">
                        <h1> Reset Password</h1>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
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
                            <div class="row">
                                <div class="col-12">                                  
                                    <button type="submit" class="btn  btn-block btn-outline-dark">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                                <!-- /.col -->
                            </div> 
                        </form>                                                              
                    </div>
                    <!-- /.login-card-body -->
                    <div class="card-footer bg-dark">
                        <div class="  row justify-content-start ">
                            <div class="col-md-4">
                                <p class="mt-3">
                                    <a href="login" class="btn btn-light btn-block">Login</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
