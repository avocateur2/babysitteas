<?php

namespace App\Http\Controllers;

use App\Http\ApiController;
use Illuminate\Http\Request;

use Storage;
use Config;
use Auth;
use App\Models\Advertisement;
use App\Http\Resources\AdvertisementCollection;
use App\Http\Resources\Advertisement as AdvertisementResource;

class AdvertisementController extends ApiController
{
  public function getAllAdvertisements()
  {
    $advs = Advertisement::all();
    $userResource = new AdvertisementCollection($advs);

    return $userResource;
  }

  public function getAdvertisements($id)
  {
    $perms = Config::get('constants.permissions.advertisement');
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
      $advs = Advertisement::where('user_id', '=', $id)->get();
      $advResource = new AdvertisementResource($advs);

      $response = $advResource;
    } else {
      $response = redirect()->route('unauthorized');
    }

    return $response;
  }

  public function getAdvertisement($id)
  {
    $perms = Config::get('constants.permissions.advertisement');
    $userAuth = Auth::user();
    $advertisement = Advertisement::find($id);
    $userId = $advertisement->user_id;

    $authorized = true;

    if (!$userAuth->can($perms['any']['read'])) {
      if (!$userAuth->can($perms['own']['read'])) {
        $authorized = false;
      } else {
        if ($userAuth->id !== $userId) {
          $authorized = false;
        }
      }
    }

    if($authorized) {
      $advResource = new AdvertisementResource($advertisement);

      $response = $advResource;
    } else {
      $response = redirect()->route('unauthorized');
    }

    return $response;
  }
}
