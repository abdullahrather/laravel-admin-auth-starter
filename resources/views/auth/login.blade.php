@extends('auth.layouts.main')
@push('title')
    <title>Admin Portal | Log in</title>
@endpush
@section('auth-main-section')

    <body class="hold-transition login-page">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                    <div class="sidebar-brand-icon ">
                        <img src="{{ url('admin/img/logo_thumbnail.png') }}" alt="Logo">
                    </div>
                    <a href="{{ route('register') }}" class="h1"><b>Admin Portal</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <form action="{{ route('login.post') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <p class="mb-1">
                                        <a href="forgot-password.html">I forgot my password</a>
                                    </p>
                                    <p class="mb-0">
                                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                                    </p>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
    @endsection
