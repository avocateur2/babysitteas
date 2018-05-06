<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Config;
use Auth;
use App\User;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
  public function getUsers()
  {
    $users = User::all();
    $userResource = new UserCollection($users);

    return $userResource;
  }

  public function getUser($id)
  {
    $perms = Config::get('constants.permissions.user');
    $userAuth = Auth::user();

    $authorized = true;

    if (!$userAuth->can($perms['any']['read'])) {
      if (!$userAuth->can($perms['own']['read'])) {
        $authorized = false;
      } else {
        if ($userAuth->id !== $id) {
          $authorized = false;
        }
      }
    }

    if($authorized) {
      $user = User::find($id);
      var_dump($user->toArray());
      $userResource = new UserResource($user);

      $response = $userResource;
    } else {
      $response = redirect()->route('unauthorized');
    }

    return $response;
  }
}
