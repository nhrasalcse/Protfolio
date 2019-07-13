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
                                        <span class="label label-primary pull-right">{{count($messages)}}</span></a></li>
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
                                <!-- Construct the box with style you want. Here we are using box-danger -->
                                <!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
                                <!-- The contextual class should match the box, so we are using direct-chat-danger -->
                                <div class="box box-primary direct-chat direct-chat-primary">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Direct Chat</h3>
                                        <div class="box-tools pull-right">
                                            <span data-toggle="tooltip" title="3 New Messages" class="badge bg-red">3</span>
                                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                            <!-- In box-tools add this button if you intend to use the contacts pane -->
                                            <button class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle"><i class="fa fa-comments"></i></button>
                                            <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Conversations are loaded here -->
                                            @php
                                             $suser=\App\User::where('id',$message->receive_id)->get()
                                            @endphp
                                            @foreach($suser as $sData)
                                                @foreach($msg as $msData)
                                        <div class="direct-chat-messages">
                                            <!-- Message. Default to the left -->
                                            @if($msData->sender_i==$sData->id)
                                            <div class="direct-chat-msg">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-left">{{!empty($sData->name) ? $sData->name : ''}}</span>
                                                    <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{{asset('image/user-pic/'.$sData->image)}}" alt="message user image">
                                                <!-- /.direct-chat-img -->

                                                <div class="direct-chat-text">
                                                   {{$msData->msg_description }}
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            @else
                                            <!-- /.direct-chat-msg -->

                                            <!-- Message to the right -->
                                            <div class="direct-chat-msg right">
                                                <div class="direct-chat-info clearfix">
                                                    <span class="direct-chat-name pull-right">{{!empty($msData->sending_id) ? $msData->sender_id : ''}}</span>
                                                    <span class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                                </div>
                                                <!-- /.direct-chat-info -->
                                                <img class="direct-chat-img" src="{{asset('image/user-pic/'.Auth::user()->image)}}" alt="message user image">
                                                <!-- /.direct-chat-img -->
                                                <div class="direct-chat-text">
                                                    {{$msData->msg_description }}
                                                </div>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->
                                        </div>
                                            @endif
                                                @endforeach
                                        <!--/.direct-chat-messages-->
                                        @endforeach

{{--                                        <!-- Contacts are loaded here -->--}}
{{--                                        <div class="direct-chat-contacts">--}}
{{--                                            <ul class="contacts-list">--}}
{{--                                                <li>--}}
{{--                                                    <a href="#">--}}
{{--                                                        <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="Contact Avatar">--}}
{{--                                                        <div class="contacts-list-info">--}}
{{--                                                      <span class="contacts-list-name">--}}
{{--                                                        Count Dracula--}}
{{--                                                        <small class="contacts-list-date pull-right">2/28/2015</small>--}}
{{--                                                        </span>--}}
{{--                                                            <span class="contacts-list-msg">How have you been? I was...</span>--}}
{{--                                                        </div>--}}
{{--                                                        <!-- /.contacts-list-info -->--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <!-- End Contact Item -->--}}
{{--                                            </ul>--}}
{{--                                            <!-- /.contatcts-list -->--}}
{{--                                        </div>--}}
                                        <!-- /.direct-chat-pane -->
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <form action="{{route('message.reply',$id)}}" method="post">
                                            @csrf
                                        <div class="input-group">
                                            <input type="text" name="message" value=""  placeholder="Type Message ..." class="form-control">
                                            @if(Auth::user()->id==$message->receive_id)
                                            <input type="hidden" name="receive_id" value="{{$message->sender_id}}">
                                            @else
                                                <input type="hidden" name="receive_id" value="{{$message->receive_id}}">
                                            @endif
                                            <span class="input-group-btn">
                                            <button class="btn btn-primary btn-flat">Send</button>
                                            </span>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                                <!--/.direct-chat -->

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
