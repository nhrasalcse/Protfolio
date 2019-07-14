<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected  $fillable=[
        'icon',
        'name',
        'details',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
