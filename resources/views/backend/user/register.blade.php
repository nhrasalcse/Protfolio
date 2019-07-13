@extends('backend.layouts.app')
@section('title','User')
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Create User</li>
        </ol>
    </section>
    <section class="content">

        <div class="row align-content-center">
            <div class="col-xs-12 ">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-6 ">

                            <div class="box-header">
                                <h3 class="box-title">Add User for Access</h3>
                                </div>
                            <div class="register-box-body">
                                <p class="login-box-msg">Register a new membership</p>

                                <form method="POST"  action="{{ route('user.insert') }}">
                                    @csrf
                                    <div class="form-group has-feedback">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required autocomplete="new-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retry Password">
                                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                        </div>
                                        <a href="{{route('user.index')}}" class="btn btn-success pull-right">Back</a>

                                        <!-- /.col -->
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

        </div>
        <!-- /.row -->

    </section>
    </div>
@endsection
