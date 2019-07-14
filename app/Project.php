<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
   protected  $fillable=[
       'name',
       'language',
       'details',
       'project_category',
       'image',
       'date',
       'customer',
       'slug',
       'project_url',
       'delete_status',
       'user_id',
   ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
