<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table ='points';

    protected $fillable =['user_id','points'];

    public function users()
    {
          return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
