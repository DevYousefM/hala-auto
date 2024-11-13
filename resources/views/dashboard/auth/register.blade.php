@extends('layouts.guest')
@section('content')
    <main class="main-content">

        <div class="admin">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-sm-8">
                        <div class="edit-profile">
                            <div class="card border-0">
                                <div class="card-header">
                                    <div class="edit-profile__title">
                                        <h6>Sign in HexaDash</h6>
                                    </div>
                                </div>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-25">
                                                <label for="name">Full Name</label>
                                                <input type="text" class="form-control" name="name" id="name"
                                                    placeholder="name@example.com" value="{{ old('name') }}">
                                                @if ($errors->has('name'))
                                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mb-25">
                                                <label for="email">Email Address</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email') }}" placeholder="name@example.com">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password-field">password</label>
                                                <div class="position-relative">
                                                    <input id="password-field" type="password" class="form-control"
                                                        name="password" placeholder="Password">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                            <div class="form-group mb-15">
                                                <label for="password_confirmation">Confirm Password</label>
                                                <div class="position-relative">
                                                    <input id="password_confirmation" type="password" class="form-control"
                                                        name="password_confirmation" placeholder="Confirm Password">
                                                    <div
                                                        class="uil uil-eye-slash text-lighten fs-15 field-icon toggle-password2">
                                                    </div>
                                                </div>
                                                @if ($errors->has('password_confirmation'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    sign up
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- End: .card-body -->
                                </form>
                                <div class="admin-topbar">
                                    <p class="mb-0">
                                        have an account?
                                        <a href="{{ route('login') }}" class="color-primary">
                                            Sign in
                                        </a>
                                    </p>
                                </div><!-- End: .admin-topbar  -->
                            </div><!-- End: .card -->
                        </div><!-- End: .edit-profile -->
                    </div><!-- End: .col-xl-5 -->
                </div>
            </div>
        </div><!-- End: .admin-element  -->

    </main>
    <div id="overlayer">
        <div class="loader-overlay">
            <div class="dm-spin-dots spin-lg">
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
                <span class="spin-dot badge-dot dot-primary"></span>
            </div>
        </div>
    </div>
@endsection
