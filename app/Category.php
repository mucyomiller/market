<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';

    protected $fillable =['category_name','description'];

    public function products()
    {
          return $this->hasMany('App\Product', 'category_id', 'id');
    }

    public function users()
    {
          return $this->belongsTo('App\User', 'id', 'category_id');
    }
}
