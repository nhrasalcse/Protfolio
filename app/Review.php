<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected  $fillable=[
        'icon',
        'total',
        'project_status',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
