<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = ['user_id', 'title', 'slug', 'city', 'images', 'description', 'approve'];

  public function user() {
    return $this->belongsTo('App\User');
  }
}
