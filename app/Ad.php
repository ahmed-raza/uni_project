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
    'featured',
    'pull_contact_info',
    'email',
    'phone',
    'price'
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
  public function scopeGetCities() {
    $cities = [
      'Lahore'      => 'Lahore',
      'Islamabad'   => 'Islamabad',
      'Karachi'     => 'Karachi',
      'Multan'      => 'Multan',
      'Faisalabad'  => 'Faisalabad',
      'Sheikhupura' => 'Sheikhupura',
    ];
    return $cities;
  }
  public function scopeGetFeatured($query){
    $query->where('approve', 1)->where('featured', 1);
  }
}
