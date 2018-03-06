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
    return view('pages.home', compact('categories', 'cities', 'categories_for_search'));
  }
}
