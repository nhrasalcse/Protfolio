<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testmonial extends Model
{
    protected  $fillable=[
        'name',
        'rating',
        'designation',
        'details',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
