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
            <li class="active">Create Customer</li>
        </ol>
    </section>
    <section class="content">

        <div class="row align-content-center">
            <div class="col-xs-12 ">
                <div class="box box-default">
                    <div class="row">
                        <div class="col-md-6 ">

                            <div class="box-header">
                                <h3 class="box-title">New Customer Information Form</h3>
                                </div>
                            <div class="register-box-body">
                                <form method="POST"  action="{{ route('customer.insert') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Full name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Phone</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" >
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" value="" placeholder="Enter Customer Address" >{{ old('address') }}</textarea>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Organization</label>
                                        <input type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{ old('organization') }}" placeholder="Enter Customer Organization Details" >
                                        @error('organization')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Reference Info</label>
                                        <input type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{ old('reference') }}" placeholder="Enter Customer Reference Details" >
                                        @error('reference')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label for="address"> Customer Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" >
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    </div>

                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                        </div>
                                        <a href="{{route('customer.index')}}" class="btn btn-success pull-right">Back</a>

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
