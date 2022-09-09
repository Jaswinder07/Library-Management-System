@extends('layouts.master')

@section('content')
    <div class="container">
        <!-- Page Main Title  -->
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="fas fa-pen-alt"> </i>
                    </div>
                    <div>Librarian User Detail
                        <div class="page-title-subheading">If you want to change the Librarian detail then please specify
                            the valid detail.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Page Main Title  -->

        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- card -->
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>
                    <div class="card-body">
                        <!-- form -->
                        <form method="POST" action="{{ route('user-profile-information.update') }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') ?? auth()->user()->name }}" required
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') ?? auth()->user()->email }}" required
                                        autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="designation"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Designation') }}</label>

                                <div class="col-md-6">
                                    <input id="designation" type="text"
                                        class="form-control @error('designation') is-invalid @enderror" name="designation"
                                        value="{{ old('designation') ?? auth()->user()->designation }}" required
                                        autocomplete="designation" autofocus>
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dob"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                        name="dob" value="{{ old('dob') ?? auth()->user()->dob }}" required
                                        autocomplete="dob" autofocus>
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') ?? auth()->user()->address }}" required
                                        autocomplete="address" autofocus>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="contact"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text"
                                        class="form-control @error('contact') is-invalid @enderror" name="contact"
                                        value="{{ old('contact') ?? auth()->user()->contact }}" required
                                        autocomplete="contact" autofocus>
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-0 form-group row">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <!-- /form -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
