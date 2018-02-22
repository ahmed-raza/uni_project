<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Ad;

class AdminController extends Controller
{
  public function dashboard() {
    $categories = Category::all();
    $users = User::all();
    $ads = Ad::all();
    return view('admin.dashboard', compact('categories', 'users', 'ads'));
  }
  public function users() {
    $users = User::paginate(10);
    return view('admin.users.index', compact('users'));
  }
  public function ads() {
    $ads = Ad::paginate(10);
    return view('admin.ads.index', compact('ads'));
  }
}
