<?php

namespace App\Http\Routes;

use Config;

abstract class User
{
  public static function getRoutes()
  {
    $permissions = Config::get('constants.permissions');

    return array(
      'getAll' => array(
        'verb'       => 'GET',
        'route'      => 'users',
        'action'     => 'API\UserController@getUsers',
        'middleware' => "permission:{$permissions['user']['any']['read']}",
      ),
      'getOne' => array(
        'verb'       => 'GET',
        'route'      => 'user/{id}',
        'action'     => 'API\UserController@getUser',
        'middleware' => "permission:{$permissions['user']['any']['read']}|{$permissions['user']['own']['read']}",
      ),
    );
  }
}
