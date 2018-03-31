<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use App\Ad;

class AdminController extends Controller
{
  public function dashboard() {
    $categories = Category::orderBy('created_at', 'desc')->limit(5)->get();
    $users = User::orderBy('created_at', 'desc')->limit(5)->get();
    $ads = Ad::orderBy('created_at', 'desc')->limit(5)->get();
    return view('admin.dashboard', compact('categories', 'users', 'ads', 'todays_ads', 'todays_users'));
  }
  public function users() {
    $users = User::paginate(10);
    return view('admin.users.index', compact('users'));
  }
  public function ads() {
    $ads = Ad::paginate(10);
    return view('admin.ads.index', compact('ads'));
  }
  public function dashboardData(){
    $todays_ads = Ad::getTodaysAds();
    $todays_users = User::getTodaysUsers();
    $total_users = User::all();
    $total_ads = Ad::all();
    return json_encode([
      'todays_ads' => $todays_ads->count(),
      'todays_users' => $todays_users->count(),
      'total_ads' => $total_ads->count(),
      'total_users' => $total_users->count(),
    ]);
  }
}
