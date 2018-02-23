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
    return view('pages.home', compact('categories'));
  }
}
