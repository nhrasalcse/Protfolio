<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Message;
use App\Message_details;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    public function index(){
        $message=Message::where('receive_id',Auth::user()->id)->get();
        return view('backend.message.index',compact('message'));
    }
    public function create(){
        $message=Message::where('receive_id',Auth::user()->id)->get();
        $employee=User::where('delete_status','1')->get();
        return view('backend.message.create',compact('employee','message'));
    }
    public function sent(){
        $message=Message::where('receive_id',Auth::user()->id)->get();
        $auth=Auth::user()->id;
        $sentItem=Message::where('sender_id',$auth)->get();
        return view('backend.message.sent',compact('sentItem','message'));
    }
    public function chat($id){
        $messages=Message::where('receive_id',Auth::user()->id)->get();
        $msg=Message_details::where('msg_id',$id)->get();
        $message=Message::where('id',$id)->first();
        return view('backend.message.chat',compact('msg','message','id','messages'));
    }
    public function send(Request $request){
//        return $request;
        $this->validate($request,[
            'received_id' => 'required',
            'subject' => 'required',
            'msg_description' => 'required',
        ]);
//        $count=count($request->received_id);
        $input = Input::all();
        $sender=Auth::user()->id;
            $msg = new Message();
            $msg->receive_id = $request->received_id;
            $msg->sender_id = $sender;
            $msg->subject = $request->subject;
            $msg->save();
            $id=$msg->id;
            if ($id){
                $msgDetails= new Message_details();
                $msgDetails->receive_id=$request->received_id;
                $msgDetails->sender_id=$sender;
                $msgDetails->msg_id=$id;
                $msgDetails->msg_description=$request->msg_description;
                $msgDetails->seen_status= '0';
                $msgDetails->save();
            }
        Toastr::success('Message Sent Success','Success');
        return back();
    }
    public function reply(Request $request,$msg){
//        return $request;
        $msgd=new Message_details;
        $msgd->msg_description=$request->message;
        $msgd->sender_id=Auth::User()->id;
        $msgd->receive_id=$request->receive_id;
        $msgd->seen_status='0';
        $msgd->msg_id=$msg;
        $msgd->save();
        Toastr::Success('Message Send Success','Success');
        return back();
    }

}
