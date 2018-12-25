<?php

namespace App;
use Eloquent;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class AdminLogin extends Eloquent implements Authenticatable
{
    //
    use AuthenticableTrait;
    protected $table = "admin_logins";


}
