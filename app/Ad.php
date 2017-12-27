<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
  protected $fillable = [
    'user_id',
    'title',
    'slug',
    'category_id',
    'city',
    'images',
    'description',
    'approve',
    'contact_info',
    'email',
    'phone'
    ];

  public function user() {
    return $this->belongsTo('App\User');
  }
  public function category(){
    return $this->belongsTo('App\Category');
  }
  public function scopeApproved($query){
    $query->where('approve', 1);
  }
}
