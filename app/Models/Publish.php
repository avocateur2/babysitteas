<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publish extends Model
{
  protected $fillable = [
    'scheduled', 'duration',
  ];

  protected $guarded = [
    'id',
  ];

  public function publishable()
  {
    return $this->morphTo();
  }
}
