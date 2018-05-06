<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
      ];

    public function shops()
    {
      return $this->hasMany('App\Models\Shop');
    }

    public function notices()
    {
      return $this->hasMany('App\Models\Notice');
    }

    public function advertisements()
    {
      return $this->hasMany('App\Models\Advertisement');
    }

    public function events()
    {
      return $this->hasMany('App\Models\Event');
    }

    public function alerts()
    {
      return $this->hasMany('App\Models\Alert');
    }

    public function roles()
    {
      return $this->belongsToMany('App\Models\Role');;
    }
}
