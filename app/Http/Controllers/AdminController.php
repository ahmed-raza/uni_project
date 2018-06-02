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
  public function dashboardData(Request $request){
    $entity = $request->input('entity');
    $days = $request->input('days');
    $dateFrom = Carbon::today();
    $dateFrom = is_numeric($days) ? $dateFrom->subDays($days) : $dateFrom;
    $dateFrom = $dateFrom->format('Y-m-d');
    $query = DB::table($entity)->whereDate('created_at', '>=', $dateFrom)->get();
    $data = [
      'entity' => $entity,
      'results' => $query
    ];
    return view('admin.partials.data')->with($data);
  }
}
