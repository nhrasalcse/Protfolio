<?php

namespace App\Http\Controllers;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {

        return view('backend.profile.index');
    }
    public function profileUpdate(Request $request)
    {
//        return $request;
       $user = User::findOrFail(Auth::id());
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->permanent_address = $request->permanent_address;
       $user->present_address = $request->present_address;
//        for image
        $image = $request->file('image');
        if(isset($image)){
            $currentDate = Carbon::now()->toDateString();
            $imageName = $request->name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            //for image unlink
            if(!empty($user->image)) {
                if (file_exists(public_path('image/user-pic/'. $user->image))) {
                    unlink(public_path('image/user-pic/'. $user->image));
                }
            }
            $image->move(public_path().'/image/user-pic', $imageName);

        }else{
            $imageName = $user->image;
        }
        $user->image = $imageName;
        $user->save();
        Toastr::success('Profile Successfully Updated :)' ,'Success');
        return redirect()->back();
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password, $hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed :)' ,'Success');
                Auth::logout();
                return redirect()->route('login');
            }else{
                Toastr::error('New Password can not be same as old password :)' ,'Error');
                return redirect()->back();
            }
        }else{
            Toastr::error('Current Password does match. :)' ,'Error');
            return redirect()->back();
        }
    }
}
