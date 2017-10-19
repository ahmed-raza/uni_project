<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdsRequest;
use App\Category;
use App\Ad;
use Auth;

class AdsController extends Controller
{
  public function index() {
    $ads = Ad::all();

    return view('ads.index', compact('ads'));
  }
  public function show($id) {
    $ad = Ad::findOrFail($id);

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
    return redirect(route('ads.show', $ad->id))->with('message','Your ad has been posted.');
  }
}
