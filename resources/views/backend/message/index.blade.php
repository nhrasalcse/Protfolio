@extends('backend.layouts.app')
@section('title','Dashboard')
@section('css')
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Message
                <small>13 new messages</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Message</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('message.create')}}" class="btn btn-primary btn-block margin-bottom">Compose</a>

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
                                <li class="active"><a href="{{route('message.index')}}"><i class="fa fa-inbox"></i> Inbox
                                        <span class="label label-primary pull-right">{{count($message)}}</span></a></li>
                                <li><a href="{{route('message.sent')}}"><i class="fa fa-envelope-o"></i> Sent</a></li>
                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Inbox</h3>

                            <div class="box-tools pull-right">
                                <div class="has-feedback">
{{--                                    <input type="text" class="form-control input-sm" placeholder="Search Mail">--}}
{{--                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
                                </div>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>
                                    @foreach($message as $msg)
                                        @php
                                        $msgDetails=\App\Message_details::where('msg_id',$msg->id)->first();
                                        @endphp
                                    <tr>
                                        <td class="mailbox-name"><a href="{{route('message.chat',$msg->id)}}">{{!empty($msg->User->name) ? $msg->User->name : '' }}</a></td>
                                        <td class="mailbox-subject"><b>{{!empty($msg->subject) ? $msg->subject : '' }}</b> {{!empty($msgDetails->msg_description) ? Str::limit($msgDetails->msg_description, 20, '...') : '' }}
                                        </td>
                                        <td class="mailbox-attachment"></td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr>
                                    @endforeach
{{--                                    <tr>--}}
{{--                                        <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>--}}
{{--                                        <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...--}}
{{--                                        </td>--}}
{{--                                        <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>--}}
{{--                                        <td class="mailbox-date">28 mins ago</td>--}}
{{--                                    </tr>--}}
                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer no-padding">
                        </div>
                    </div>
                    <!-- /. box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
