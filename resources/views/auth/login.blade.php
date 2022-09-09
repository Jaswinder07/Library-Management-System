@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="row justify-content-center mt-2">
            <div class=" col-md-8 ">
                <div class="card ">
                    <div class="card-header bg-dark text-white text-center">
                      <h1 class="card-title">Login</h1>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input id="email" type="email" placeholder="Email"
                                    class=" form-control @error('email') is-invalid @enderror" name="email"
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
                            <div class="input-group mb-3">
                                <input id="password" type="password" placeholder="Password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
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
                            <div class="row">
                                <div class="col-3">
                                    <div class="icheck-primary form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="row justify-content-end">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-dark  btn-block">Sign In</button>
                                </div>
                            </div>
                            <!-- /.col -->
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer bg-dark text-white mt-3">
                        <div class="container">
                            <div class="row justify-content-start">
                                <p class="mb-1">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="btn btn-light">
                                           Forgot Password
                                        </a>
                                    @endif
                                </p>
                                <p class="mb-0">
                                    <a href="register"  class="btn btn-light ml-2">Register</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
