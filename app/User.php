<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone', 'personinfo_id', 'market_id','category_id','status','password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];


    /**
     *
     * Market method
     *
     */
    public function market()
    {
        return $this->belongsTo('App\Market', 'market_id', 'id');
    }
    public function persoinfo()
    {
        return $this->hasOne('App\PersonInfo', 'id', 'personinfo_id');
    }
    public function category()
    {
        return $this->hasOne('App\Category', 'id', 'category_id');
    }
    public function point()
    {
        return $this->hasOne('App\Point', 'user_id', 'id');
    }
    public function prices()
    {
        return $this->hasMany('App\Price', 'user_id', 'id');
    }
    public function Messages()
    {
        return $this->hasMany('App\Message');
    }
}
