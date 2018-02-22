<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdsRequest;
use App\Category;
use App\Ad;
use Auth;
use File;

class AdsController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except'=>['show', 'index']]);
  }
  public function index() {
    $ads = Ad::approved()->get();
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
    $ad = $this->createOrUpdate($request);
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
    $ad = $this->createOrUpdate($request, true, $id);
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
  private function createOrUpdate($request, $update = false, $id = null) {
    $ad = $update ? Ad::findOrFail($id) : new Ad;
    $ad->slug             = str_slug($request->input('title'), "-");
    $ad->title            = $request->input('title');
    $ad->user_id          = Auth::user()->id;
    $ad->category_id      = $request->input('category_id');
    $ad->price            = $request->input('price');
    $ad->city             = $request->input('city');
    $ad->pull_contact_info= $request->input('pull_contact_info');
    $ad->description      = $request->input('description');
    $ad->phone            = $request->input('contact_info') ? "" : $request->input('phone');
    $ad->email            = $request->input('contact_info') ? "" : $request->input('email');
    $ad->images           = $update ? implode(';', $request->input('image_names')) : "";
    $ad->save();
    if ($request->file('images')[0] !== null) {
      $ad = Ad::findOrFail($ad->id);
      $images = $request->file('images');
      foreach ($images as $key => $image) {
        $imageName = time() ."_($key)_". $image->getClientOriginalName();
        $imagePath = public_path()."/files/ads/".$ad->id;
        $image->move($imagePath, $imageName);
        $ad->images .= "$imageName;";
      }
      $ad->save();
    }
    if ($update) {
      $remove_images = $request->input('image_names');
      foreach (glob(public_path()."/files/ads/".$ad->id."/*") as $image) {
        if (!in_array(basename($image), $remove_images)) {
          File::delete($image);
        }
      }
    }
    return $ad;
  }
}
