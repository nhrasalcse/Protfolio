<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkEducation extends Model
{
    protected  $fillable=[
        'title',
        'details',
        'date',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
