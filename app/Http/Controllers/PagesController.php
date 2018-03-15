<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Ad;
use App\Category;

class PagesController extends Controller
{
  public function home() {
  	$categories = Category::all();
  	$categories_for_search = Category::pluck('name', 'id');
  	$cities = Ad::getCities();
    $latest_ads = Ad::orderBy('created_at', 'desc')->limit(5)->get();
    $featured_ads = Ad::getFeatured()->get();
    return view('pages.home', compact('categories', 'cities', 'categories_for_search', 'latest_ads', 'featured_ads'));
  }
}
