<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonInfo extends Model
{
    protected $table ='personinfos';

    protected $fillable =['fistname','lastname','idnumber'];

    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'personinfo_id');
    }
}
