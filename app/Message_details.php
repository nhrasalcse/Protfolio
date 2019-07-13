<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message_details extends Model
{
    protected $fillable=[
        'msg_id',
        'msg_description',
        'seen_status',
    ];
}
