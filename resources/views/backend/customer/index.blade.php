@extends('backend.layouts.app')
@section('title','Dashboard')
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
            <li class="active">ALL Customer</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Customer Data Table</h3>
                        <a href="{{route('customer.create')}}" class="btn btn-primary pull-right" > Add Customer</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Address</th>
                                <th>Organization</th>
                                <th>Reference</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($customer)>0)
                                @foreach($customer as $userData)
                            <tr>
                                <td><img src="{{!empty($userData->image) ? asset('image/customer/'.$userData->image) : asset('image/user-pic/user.jpg')}}" alt="" height="50px" width="50px"></td>
                                <td>{{!empty($userData->name) ? $userData->name :''}}</td>
                                <td>{{!empty($userData->phone) ? $userData->phone :''}}</td>
                                <td>{{!empty($userData->email) ? $userData->email :''}}</td>
                                <td>{{!empty($userData->address) ? $userData->address :''}}</td>
                                <td>{{!empty($userData->organization) ? $userData->organization :''}}</td>
                                <td>{{!empty($userData->reference) ? $userData->reference :''}}</td>
                                <td><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$userData->id}}">Edit</a></td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit-{{$userData->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="width: 100%; max-width: 1000px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><b>{{!empty($userData->name) ? $userData->name :''}}</b> </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"  action="{{ route('customer.update',$userData->id) }}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Name</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{!empty($userData->name) ? $userData->name :''}}" required autocomplete="name" placeholder="Full name" autofocus>
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Phone</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{!empty($userData->phone) ? $userData->phone :''}}" placeholder="Enter Phone Number" >
                                                    @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Email</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{!empty($userData->email) ? $userData->email :''}}" placeholder="Enter Email" required autocomplete="email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Address</label>
                                                    <textarea class="form-control @error('address') is-invalid @enderror" name="address" value="" placeholder="Enter Customer Address" >{{!empty($userData->address) ? $userData->address :''}}</textarea>
                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Organization</label>
                                                    <input type="text" class="form-control @error('organization') is-invalid @enderror" name="organization" value="{{!empty($userData->organization) ? $userData->organization :''}}" placeholder="Enter Customer Organization Details" >
                                                    @error('organization')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Reference Info</label>
                                                    <input type="text" class="form-control @error('reference') is-invalid @enderror" name="reference" value="{{!empty($userData->reference) ? $userData->reference :''}}" placeholder="Enter Customer Reference Details" >
                                                    @error('reference')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <label for="address"> Customer Image</label>
                                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{!empty($userData->image) ? $userData->image :''}}" >
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                </div>
                                                <div class="form-group has-feedback">
                                                    <img src="{{!empty($userData->image) ? asset('image/customer/'.$userData->image) : asset('image/user-pic/user.jpg')}}" alt="" height="50px" width="50px">
                                                </div>

                                                <div class="row">
                                                    <!-- /.col -->
                                                    <div class="col-xs-4">
                                                        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                                    </div>
                                                    <!-- /.col -->
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>email</th>
                                <th>Address</th>
                                <th>Organization</th>
                                <th>Reference</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
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
