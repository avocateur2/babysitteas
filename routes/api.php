<?php

use Illuminate\Http\Request;

use App\Http\Routes\User as UserRoutes;
use App\Http\Routes\Advertisement as AdvertisementRoutes;
use App\Http\Routes\Publish as PublishRoutes;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

$permissions = Config::get('constants.permissions');
$roles       = Config::get('constants.roles');

Route::any('unauthorized', function()
{
  return response('Unauthorized', 403);
})->name('unauthorized');

Route::any('error', function()
{
  return response('Error', 400);
})->name('error');

Route::any('success', function()
{
  return response('Success', 200);
})->name('success');

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => ['auth:api']], function() use($permissions, $roles) {
  $routes = array(
//    'user'          => UserRoutes::getRoutes(),
//    'advertisement' => AdvertisementRoutes::getRoutes(),
    'publish' => PublishRoutes::getRoutes(),
  );

  foreach ($routes as $resource) {
    foreach($resource as $routeDefinition) {
      $verb = strtolower($routeDefinition['verb']);
      $route = $routeDefinition['route'];
      $action = $routeDefinition['action'];
//      $middleware = $routeDefinition['middleware'];
      $middleware = '';

      if (!empty($middleware)) {
        Route::$verb($route, $action)->middleware($middleware);
      } else {
        Route::$verb($route, $action);
      }
    }
  }
});
