<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['only'=>['ads']]);
  }
  public function ads() {
    $ads = Auth::user()->ads;
    return view('users.ads', compact('ads'));
  }
}
