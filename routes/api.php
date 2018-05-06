<?php

use Illuminate\Http\Request;

use App\Http\Routes\User as UserRoutes;

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
  return response('', 403);
})->name('unauthorized');

Route::any('error', function()
{
  return response('', 400);
})->name('error');

Route::any('success', function()
{
  return response('', 200);
})->name('success');

Route::post('login', 'API\AuthController@login');
Route::post('register', 'API\AuthController@register');

Route::group(['middleware' => 'auth:api'], function() use($permissions, $roles) {
  $routes = array(
    'user' => UserRoutes::getRoutes(),
  );

  foreach ($routes as $resource) {
    foreach($resource as $routeDefinition) {
      $verb = strtolower($routeDefinition['verb']);
      $route = $routeDefinition['route'];
      $action = $routeDefinition['action'];
      $middleware = $routeDefinition['middleware'];

      if (!empty($middleware)) {
        Route::$verb($route, $action)->middleware($middleware);
      } else {
        Route::$verb($route, $action);
      }
    }
  }
});
