@extends('backend.layouts.app')
@section('title','User')
@section('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('content')
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mailbox
                <small>13 new messages</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Mailbox</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('message.index')}}" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>

                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Folders</h3>

                            <div class="box-tools">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="box-body no-padding">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="{{route('message.index')}}"><i class="fa fa-inbox"></i> Inbox
                                        <span class="label label-primary pull-right">{{count($message)}}</span></a></li>
                                <li><a href="{{route('message.sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /. box -->
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                    <div class="col-md-9">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Compose New Message</h3>
                            </div>
                            <!-- /.box-header -->

                            <form action="{{route('message.send')}}" method="POST">
                                @csrf
                                <div class="box-body">

                                        <div class="form-group">
                                            @if(count($employee)>0)
                                                <select class="form-control select2" name="received_id" style="width: 100%;">
                                                        style="width: 100%;">
                                                    <option value=""> select</option>
                                                    @foreach($employee as $Data)
                                                        @if(Auth::user()->id!=$Data->id)
                                                        <option value="{{$Data->id}}">{{$Data->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            @endif
                                            {{--                                <input class="form-control" placeholder="To:">--}}
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" name="subject" placeholder="Subject:">
                                        </div>
                                        <div class="form-group">
                        <textarea id="compose-textarea" class="form-control" name="msg_description" style="height: 300px">

                        </textarea>
                                    </div>

                                </div>
                                <!-- /.box-body -->

                                <div class="box-footer">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.box-footer -->
                        </div>
                        <!-- /. box -->
                    </div>
                    <!-- /.col -->
              </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
@section('js')
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()
        });
    </script>
@endsection
