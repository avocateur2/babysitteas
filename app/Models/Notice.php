<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
  protected $fillable = [
    'title', 'text',
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
