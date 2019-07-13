<?php

namespace App\Http\Controllers;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $user=User::all();
        return view('backend.user.index',compact('user'));
    }
    public function create(){
        return view('backend.user.register');
    }
    public function store(Request $request){
        $password=$request->password;
        $confirmpass=$request->password_confirmation;
        if ($password == $confirmpass){
            $user=new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password= Hash::make($password);
            $user->save();
            Toastr::success('Add user Successfully','Successs');
            return back();
        }else{
            Toastr::error('Your Password not Match Confirm Password','Error');
            return back();
        }


    }
    public function status($id){

        $user=User::findOrFail($id);
       if ( $user->status==0){
           $user->status=1;
       }else{
           $user->status=0;
       }
       $user->save();
       Toastr::success('Inactive/Active Success');
       return back();
    }
}
