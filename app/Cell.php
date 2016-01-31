<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    public $timestamps =false;
    protected $table ='cells';

    protected $fillable =['cell_name','sector_id'];

    public function sector()
    {
          return $this->belongsTo('App\Sector');
    }
    public function markets()
    {
          return $this->hasMany('App\Market');
    }
}
