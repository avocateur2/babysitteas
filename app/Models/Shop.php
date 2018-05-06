<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'shops';

  protected $fillable = [
    'name', 'address', 'hours', 'rating',
  ];

  protected $guarded = [
    'id',
  ];

  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
