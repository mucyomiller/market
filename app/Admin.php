<?php
namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Kbwebs\MultiAuth\PasswordResets\CanResetPassword;
use Kbwebs\MultiAuth\PasswordResets\Contracts\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Admin extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    protected $table ='admins';
    protected $fillable = ['username','password','firstname','lastname','email','job_title','profile_pic'];
    /**
     * attributes excluded form model's JSON  form
     * @var array
     */
    protected $hidden = ['password','remember_token'];
}
