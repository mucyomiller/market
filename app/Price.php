<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table ='prices';

    protected $fillable =['market_id','product_id','current','price','user_id'];

    public function market()
    {
        return $this->belongsTo('App\Market');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
