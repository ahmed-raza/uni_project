<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['only'=>['ads']]);
  }
  public function profile() {
    $user = Auth::user();
    return view('users.profile', compact('user'));
  }
  public function ads() {
    $ads = Auth::user()->ads;
    return view('users.ads', compact('ads'));
  }
}
