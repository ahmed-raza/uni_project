<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;

class AdminController extends Controller
{
  public function dashboard() {
    $categories = Category::all();
    $users = User::all();
    return view('admin.dashboard', compact('categories', 'users'));
  }
}
