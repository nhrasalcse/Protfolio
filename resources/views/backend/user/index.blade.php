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
            <li class="active">ALL User</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">User Data Table</h3>
                        <a href="{{route('user.create')}}" class="btn btn-primary pull-right" > Add User</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($user)>0)
                                @foreach($user as $userData)
                            <tr>
                                <td><img src="{{!empty($userData->image) ? asset('image/user-pic/'.$userData->image) :asset('image/user-pic/user.jpg')}}" alt="" height="50px" width="50px"></td>
                                <td>{{!empty($userData->name) ? $userData->name :''}}</td>
                                <td>{{!empty($userData->email) ? $userData->email :''}}</td>
                                <td>{{!empty($userData->phone) ? $userData->phone :''}}</td>
                                @if(Auth::user()->id!=$userData->id)

                                <td>
                                    @if($userData->status==1)
                                    <a href="{{route('user.status',$userData->id)}}" class="btn btn-primary" title="This User Already Active">Make Inactive</a>
                                    @else
                                    <a href="{{route('user.status',$userData->id)}}" class="btn btn-danger" title="This User Already Inactive">Make active</a>
                                    @endif
                                </td>
                                @endif
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
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
