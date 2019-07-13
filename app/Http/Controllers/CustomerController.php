<?php

namespace App\Http\Controllers;

use App\Customer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index(){
        $customer=Customer::all();
        return view('backend.customer.index',compact('customer'));
    }
    public function create(){
        return view('backend.customer.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);
        $user=Auth::user()->id;
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->organization=$request->organization;
        $customer->reference=$request->reference;
        $customer->user_id=$user;
        $image = $request->file('image');
        if(isset($image)){
            $imageName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/image/Customer', $imageName);
            //$path=$image->storeAs('public/image/customer',$imageName);
            $customer->image=$imageName;
        }
        $customer->save();
        Toastr::Success('Customer Update Success','Success');
        return back();
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);
        $user=Auth::user()->id;
        $customer= Customer::findorFail($id);
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->organization=$request->organization;
        $customer->reference=$request->reference;
        $customer->user_id=$user;
        //for image
        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //for image unlink

            if(!empty($customer->image)) {
                if (file_exists(public_path('image/Customer/'. $customer->image))) {
                    unlink(public_path('image/Customer/'. $customer->image));
                }
            }
            $image->move(public_path().'/image/Customer', $imageName);

        }else{
            $imageName = $customer->image;
        }
//        return $imageName;
        $customer->image=$imageName;
        $customer->save();
        Toastr::Success('Customer Update Success','Success');
        return back();

    }

}
