<?php

namespace App\Http\Routes;

use Config;

abstract class Advertisement
{
  public static function getRoutes()
  {
    $perms = Config::get('constants.permissions');
    $advPerms = $perms['advertisement'];

    return array(
      'getAll' => array(
        'verb'       => 'GET',
        'route'      => 'advertisements',
        'action'     => 'AdvertisementController@getAllAdvertisements',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      'getSelf' => array(
        'verb'       => 'GET',
        'route'      => 'advertisements/user/{id}',
        'action'     => 'AdvertisementController@getAdvertisements',
//        'middleware' => "permission:{$advPerms['any']['read']}|{$advPerms['own']['read']}",
      ),
      'getOne' => array(
        'verb'       => 'GET',
        'route'      => 'advertisements/{id}',
        'action'     => 'AdvertisementController@getAdvertisement',
//        'middleware' => "permission:{$advPerms['any']['read']}|{$advPerms['own']['read']}",
      ),
    );
  }
}
