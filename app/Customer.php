<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $fillable=[
       'name',
       'phone',
       'email',
       'address',
       'organization',
       'reference',
       'user_id',
       'image',
   ];
}
