<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
   protected $fillable=[
    'sender_id',
    'receive_id',
    'subject',
];
    public function user(){
        return $this->belongsTo(User::class,'receive_id');
    }
//    public function Users(){
//        return $this->belongsTo(User::class,'sender_id');
//    }

}
