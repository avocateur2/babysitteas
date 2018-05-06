<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    $parent = parent::toArray($request);
    $self = array(
      'name' => $this->name,
      'email' => $this->email,
      'roles' => new RoleCollection($this->roles),
    );

    $resource = array_merge($parent, $self);

    return $resource;
  }
}
