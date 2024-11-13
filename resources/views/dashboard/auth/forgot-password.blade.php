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
                                        <p class="text-center">Forgot your password? No problem. Just let us know your email
                                            address and we will email you a password reset link that will allow you to
                                            choose a new one</p>
                                    </div>
                                </div>
                                <form action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <div class="edit-profile__body">
                                            <div class="form-group mb-25">
                                                <label for="username">Username or Email Address</label>
                                                <input type="text" class="form-control" name="email" id="username"
                                                    placeholder="name@example.com" value="{{ old('email') }}">
                                                @if ($errors->has('email'))
                                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>
                                            <div
                                                class="admin__button-group button-group d-flex pt-1 justify-content-md-start justify-content-center">
                                                <button type="submit"
                                                    class="btn btn-primary btn-default w-100 btn-squared text-capitalize lh-normal px-50 signIn-createBtn ">
                                                    Email Password Reset Link
                                                </button>
                                            </div>
                                        </div>
                                    </div><!-- End: .card-body -->
                                </form>
                            </div><!-- End: .card -->
                        </div><!-- End: .edit-profile -->
                    </div><!-- End: .col-xl-5 -->
                </div>
            </div>
        </div><!-- End: .admin-element  -->

    </main>

    <div class="enable-dark-mode dark-trigger">
        <ul>
            <li>
                <a href="#">
                    <i class="uil uil-moon"></i>
                </a>
            </li>
        </ul>
    </div>
@endsection
