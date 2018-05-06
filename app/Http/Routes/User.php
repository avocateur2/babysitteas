<?php

namespace App\Http\Routes;

use Config;

abstract class User
{
  public static function getRoutes()
  {
    $perms = Config::get('constants.permissions');
    $usrPerms = $perms['user'];

    return array(
      array(
        'verb'       => 'GET',
        'route'      => 'users',
        'action'     => 'UserController@getUsers',
//        'middleware' => "permission:{$usrPerms['any']['read']}",
      ),
      array(
        'verb'       => 'GET',
        'route'      => 'users/{id}',
        'action'     => 'UserController@getUser',
//        'middleware' => "permission:{$usrPerms['any']['read']}|{$usrPerms['own']['read']}",
      ),
      array(
        'verb'       => 'GET',
        'route'      => 'users/self',
        'action'     => 'UserController@getSelf',
//        'middleware' => "permission:{$usrPerms['own']['read']}",
      ),
    );
  }
}
