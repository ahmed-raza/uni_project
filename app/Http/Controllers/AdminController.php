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
}
