<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
     protected $table = 'message';
     protected $fillable = ['user_id', 'subject','message'];

     public function user()
     {
      return $this->belongsTo('App\User' , 'user_id');
     }
}
