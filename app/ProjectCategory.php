<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected  $fillable=[
        'name',
        'icon',
        'delete_status',
        'user_id',
    ];
    public  function  user(){
        return  $this->belongsTo(User::class,'user_id');
    }
}
