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
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{!empty(Auth::user()->image) ? asset('image/user-pic/'.Auth::user()->image) :asset('image/user-pic/user.jpg')}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">Details</a></li>
                        <li><a href="#settings" data-toggle="tab">Profile</a></li>
                        <li><a href="#timeline" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <table class="table table-striped table-responsive">
                                        <tr>
                                            <th width="5%">Name: </th>
                                            <td>{{Auth::user()->name}}</td>
                                        </tr>
                                        <tr>
                                            <th width="5%">Email: </th>
                                            <td>{{Auth::user()->email}}</td>
                                        </tr>
                                        <tr>
                                            <th width="5%">Phone : </th>
                                            <td>{{Auth::user()->phone}}</td>
                                        </tr>
                                        <tr>
                                            <th width="5%">Present Address: </th>
                                            <td>{{Auth::user()->present_address}}</td>
                                        </tr>
                                        <tr>
                                            <th width="5%">Permanent Address: </th>
                                            <td>{{Auth::user()->permanent_address}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class=" tab-pane" id="settings">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <form class="form-horizontal" action="{{route('profile-update')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>

                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Email</label>

                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone" id="email" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Present Address</label>
                                            <div class="col-sm-10">
                                                <textarea name="present_address" class="form-control" id="address"  >{{Auth::user()->present_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Permanent Address</label>
                                            <div class="col-sm-10">
                                                <textarea name="permanent_address" class="form-control" id="address"  >{{Auth::user()->permanent_address}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-sm-2 control-label">Image</label>

                                            <div class="col-sm-10">
                                                <input type="file" name="image" class="form-control-file" id="image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

{{--                        <div class="tab-pane" id="settings">--}}
{{--                                                        <form class="form-horizontal" action="{{route('profile-update')}}" method="POST" enctype="multipart/form-data">--}}
{{--                            @csrf--}}
{{--                            @method('PUT')--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name" class="col-sm-2 control-label">Name</label>--}}

{{--                                <div class="col-sm-10">--}}
{{--                                    <input type="text" class="form-control" name="name" id="name" value="{{Auth::user()->name}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email" class="col-sm-2 control-label">Email</label>--}}

{{--                                <div class="col-sm-10">--}}
{{--                                    <input type="email" class="form-control" name="email" id="email" value="{{Auth::user()->email}}">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="address" class="col-sm-2 control-label">Address</label>--}}
{{--                                <div class="col-sm-10">--}}
{{--                                    <textarea name="address" class="form-control" id="address"  >{{Auth::user()->address}}</textarea>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="image" class="col-sm-2 control-label">Image</label>--}}

{{--                                <div class="col-sm-10">--}}
{{--                                    <input type="file" name="image" class="form-control-file" id="image">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <div class="col-sm-offset-2 col-sm-10">--}}
{{--                                    <button type="submit" class="btn btn-danger">Submit</button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            </form>--}}
{{--                        </div> --}}

                        <div class="tab-pane" id="timeline">

                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                            <!-- The password -->
                            <form class="form-horizontal" action="{{route('password-update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="old_password" class="col-sm-2 control-label">Old Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter your Old Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-2 control-label" >Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter New password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="col-sm-2 control-label">Confirm Password</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" name="password_confirmation" id="password"  placeholder="Enter Confirm Password" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>
    </div>
@endsection
