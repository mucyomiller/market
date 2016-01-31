<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    public $timestamps = false;
    protected $table ='markets';

    protected $fillable =['market_name','cell_id'];

    public function cell()
    {
        return $this->belongsTo('App\Cell');
    }

    public function users()
    {
        return $this->hasMany('App\User', 'market_id', 'id');
    }
    public function prices()
    {
        return $this->hasMany('App\Price');
    }
}
