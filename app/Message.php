<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     protected $table = 'message';
     protected $fillable = ['user_id', 'subject','message'];

     public function user()
     {
      return $this->hasMany('App\User', 'id' , 'user_id');
     }
}
