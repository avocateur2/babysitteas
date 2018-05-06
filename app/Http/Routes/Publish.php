<?php

namespace App\Http\Routes;

use Config;

abstract class Publish
{
  public static function getRoutes()
  {
    return array(
      array(
        'verb'       => 'GET',
        'route'      => 'publishes',
        'action'     => 'PublishController@getPublishes',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      array(
        'verb'       => 'POST',
        'route'      => 'publish/{type}/{id}',
        'action'     => 'PublishController@addPublish',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      array(
        'verb'       => 'POST',
        'route'      => 'publish/notice/{id}',
        'action'     => 'PublishController@addPublishNotice',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      array(
        'verb'       => 'POST',
        'route'      => 'publish/advertisement/{id}',
        'action'     => 'PublishController@addPublishAdvertisement',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      array(
        'verb'       => 'POST',
        'route'      => 'publish/event/{id}',
        'action'     => 'PublishController@addPublishEvent',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
      array(
        'verb'       => 'POST',
        'route'      => 'publish/alert/{id}',
        'action'     => 'PublishController@addPublishAlert',
//        'middleware' => "permission:{$advPerms['any']['read']}",
      ),
    );
  }
}
