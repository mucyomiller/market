<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';

    protected $fillable =['product_name','quantity_unit','category_id'];

    public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function catergory()
    {
        return $this->hasOne('App\Category');
    }
}
