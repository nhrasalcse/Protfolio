<?php

namespace App\Http\Controllers;

use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        $employee=Employee::where('delete_status','1')->get();
        return view('backend.employee.index',compact('employee'));
    }
    public function create(){
        return view('backend.employee.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'designation'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);
        $user=Auth::user()->id;
        $employee = new Employee();
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->email=$request->email;
        $employee->address=$request->address;
        $employee->designation=$request->designation;
        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move(public_path().'/image/employee', $imageName);
            $employee->image=$imageName;

        }else{
            $employee->image = 'default.jpg';
        }

        $employee->user_id=$user;
        $employee->save();
        Toastr::success('Employee Insert Success','Success');
        return back();
    }
    public function update( Request $request, $id){
//        return $id;
        $this->validate($request,[
            'name'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'designation'=>'required',
            'image'=>'image|mimes:jpg,png,jpeg',
        ]);
        $employee=Employee::findOrFail($id);
        $user=Auth::user()->id;
        $employee->name=$request->name;
        $employee->phone=$request->phone;
        $employee->email=$request->email;
        $employee->address=$request->address;
        $employee->designation=$request->designation;
        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //for image unlink

            if(!empty($employee->image)) {
                if (file_exists(public_path('image/employee/'. $employee->image))) {
                    unlink(public_path('image/employee/'. $employee->image));
                }
            }
            $image->move(public_path().'/image/employee', $imageName);

        }else{
            $imageName = $employee->image;
        }
        $employee->image=$imageName;
        $employee->user_id=$user;
        $employee->save();
        Toastr::success('Employee Update Success','Success');
        return back();
    }
}
