<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  protected $fillable = [
    'name', 'datestart', 'dateend', 'price', 'url',
  ];

  protected $guarded = [
    'id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function publishes()
  {
    return $this->morphMany('App\Models\Publish', 'publishable');
  }
}
