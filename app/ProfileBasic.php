<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfileBasic extends Model
{
    protected  $fillable=[
        'profession',
        'about_me',
        'skill',
        'why_me',
        'my_vision',
        'service_content',
        'project_content',
        'work_education_content',
        'blog_content',
        'hire_content',
        'client_content',
        'header_cover_image',
        'review_cover_image',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
