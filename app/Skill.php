<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected  $fillable=[
        'name',
        'value',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
