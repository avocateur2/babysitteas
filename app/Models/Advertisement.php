<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
  protected $fillable = [
    'url',
  ];

  protected $guarded = [
    'id',
  ];

  public function shop()
  {
    return $this->belongsTo('App\Model\Shop');
  }

  public function publishes()
  {
    return $this->morphMany('App\Models\Publish', 'publishable');
  }
}
