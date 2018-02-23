<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UsersRequest;
use Auth;
use App\User;

class UsersController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['except'=>['profile']]);
    $this->middleware('userOrAdmin', ['only'=>['ads', 'edit']]);
  }
  public function profile() {
    $user = Auth::user();
    return view('users.profile', compact('user'));
  }
  public function ads($id) {
    $user = User::findOrFail($id);
    return view('users.ads', compact('user'));
  }
  public function edit($id) {
    $user = User::findOrFail($id);
    return view('users.edit', compact('user'));
  }
  public function update($id, UsersRequest $request) {
    $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect()->back()->with('message', 'User updated.');
  }
}
