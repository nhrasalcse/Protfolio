<?php

namespace App\Http\Controllers;

use App\ProfileBasic;
use Illuminate\Http\Request;

class ProfileBasicController extends Controller
{
  public  function  index(){
      return  view('backend.frontendinfo.create');
  }
  public function store(Request $request){
      $this->validate($request,[
          'about_me'=>'required',
          'why_me'=>'required',
          'my_vision'=>'required',
          'service_content'=>'required',
          'project_content'=>'required',
          'work_education_content'=>'required',
          'blog_content'=>'required',
          'hire_content'=>'required',
          'client_content'=>'required',
          'header_cover_image'=>'required|mimes:jpg,jpeg,png',
          'review_cover_image'=>'required|mimes:jpg,jpeg,png',
      ]);
      $data=new ProfileBasic();
      $data->about_me=$request->about_me;
      $data->why_me=$request->why_me;
      $data->my_vision=$request->my_vision;
      $data->service_content=$request->service_content;
      $data->project_content=$request->project_content;
      $data->work_education_content=$request->work_education_content;
      $data->blog_content=$request->blog_content;
      $data->hire_content=$request->hire_content;
      $data->client_content=$request->client_content;
      $headerimage = $request->file('header_cover_image');
      $reviewimage = $request->file('review_cover_image');
      if ($headerimage and  $reviewimage){
          $headerimageName='header'.'.'.$headerimage->getClientOriginalExtension();
          $reviewName='review'.'.'.$reviewimage->getClientOriginalExtension();
          $headerimage->move(public_path().'/backend/cover', $headerimageName);
          $reviewimage->move(public_path().'/backend/cover', $reviewName);
          $data->header_cover_image=$headerimageName;
          $data->review_cover_image=$reviewName;
      }
      $data->save();
      return 'ok';
  }
}
