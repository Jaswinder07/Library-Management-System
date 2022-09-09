@extends('layouts.master')

@section('content')
    <div class="container">
         <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-key"> </i>
                    </div>
                    <div>Librarian Password Update
                        <div class="page-title-subheading">If you want to change the Librarian password then please specify the valid detail.
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <!-- /.Page Main Title  -->
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- Card -->
                <div class="card">
                    <div class="card-header">{{ __('Change Password') }}</div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- password update form -->
                        <form method="POST" action="{{ route('user-password.update') }}">
                            @csrf
                            @method('PUT')

                            @if (session('status') == 'password-updated')
                                <div class="row justify-content-center" id="session_alert">
                                    <div class="alert alert-success text-center col-md-6">
                                        Password updated successfully.
                                    </div>
                                </div>
                            @endif

                            {{-- @if (session('status') == 'password-updated')
                                <div class="alert alert-success">
                                    Password updated successfully.
                                </div>
                            @endif --}}

                            <div class="form-group row">
                                <label for="current_password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>
                                <div class="col-md-6">
                                    <input id="current_password" type="password"
                                        class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                        name="current_password" required autofocus>
                                    @error('current_password', 'updatePassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                        name="password" required autocomplete="new-password">
                                    @error('password', 'updatePassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn  btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!--  /.password-update-form -->
                    </div>
                    <!-- /.Card-body -->
                </div>
                <!-- /.Card- -->
            </div>
        </div>
    </div>
@endsection
