<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    public $timestamps = false;
    protected $table ='sectors';

    protected $fillable =['sector_name','district_id'];

    public function district()
    {
        return $this->belongsTo('App\District');
    }

    public function cells()
    {
        return $this->hasMany('App\Cell');
    }

    public function markets()
    {
        return $this->hasManyThrough('App\Market', 'App\Cell');
    }
}
