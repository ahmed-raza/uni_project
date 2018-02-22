<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdsRequest;
use App\Category;
use App\Ad;
use Auth;

class AdsController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except'=>['show', 'index']]);
  }
  public function index() {
    $ads = Ad::latest('created_at')->approved()->get();
    return view('ads.index', compact('ads'));
  }
  public function show($slug) {
    $ad = Ad::where('slug', $slug)->first();
    return view('ads.show', compact('ad'));
  }
  public function create() {
    $categories = Category::pluck('name', 'id');
    return view('ads.create', compact('categories'));
  }
  public function store(AdsRequest $request) {
    $slug = str_slug($request->input('title'), "-");
    $images = "";
    $phone = 0;
    $email = "";
    if (!$request->input('contact_info')) {
      $phone = $request->input('phone');
      $email = $request->input('email');
    }
    $request->request->add([
      'slug'        => $slug,
      'phone'       => $phone,
      'email'       => $email,
      'images'      => $images,
      'category_id' => $request->input('category_id'),
    ]);
    $ad = Auth::user()->ads()->create($request->all());
    return redirect(route('ads.show', $ad->slug))->with('message','Your ad has been created, an admin will approve it after reviewing.');
  }
  public function edit($id) {
    $ad = Ad::findOrFail($id);
    if (Gate::allows('update-ad', $ad)) {
      $categories = Category::pluck('name', 'id');
      return view('ads.edit', compact('ad','categories'));
    }
    return abort(403);
  }
  public function update($id, AdsRequest $request) {
    $ad = Ad::findOrFail($id);
    $images = "";
    $phone = 0;
    $email = "";
    if (!$request->input('contact_info')) {
      $phone = $request->input('phone');
      $email = $request->input('email');
    }
    $request->request->add([
      'phone'       => $phone,
      'email'       => $email,
      'images'      => $images,
      'category_id' => $request->input('category_id'),
    ]);
    $ad->update($request->all());
    return redirect(route('admin.ads'))->with('message','Ad updated successfully.');
  }
  public function delete($id) {
    $ad = Ad::findOrFail($id);
    return view('partials.delete')->with(['entity_type'=>'ads', 'entity_id'=>$ad->id]);
  }
  public function destroy($id) {
    $ad = Ad::findOrFail($id);
    $ad->delete();
    return redirect(route('user.ads'))->with('message', 'Ad deleted.');
  }
}
