<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
    $categories = Category::pluck('category', 'id');
    return view('ads.create', compact('categories'));
  }
  public function store(AdsRequest $request) {
    $slug = str_slug($request->input('title'), "-");
    $images = "";
    $request->request->add(['slug'=>$slug, 'images'=>$images,'category_id'=>$request->input('category')]);
    $ad = Auth::user()->ads()->create($request->all());
    return redirect(route('ads.show', $ad->slug))->with('message','Your ad has been posted.');
  }
  public function edit($id) {
    $ad = Ad::findOrFail($id);
    $categories = Category::pluck('category', 'id');
    return view('ads.edit', compact('ad','categories'));
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
