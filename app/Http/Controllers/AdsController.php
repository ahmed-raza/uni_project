<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\AdsRequest;
use App\Category;
use App\Ad;
use Auth;
use File;
use Validator;

class AdsController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except'=>['show', 'index']]);
    $this->middleware('userOrAdmin', ['only'=>['edit', 'delete']]);
  }
  public function index(Request $request) {
    $ads = Ad::approved()->orderBy('created_at', 'desc')->paginate(5);
    $cities = Ad::getCities();
    $categories_for_search = Category::pluck('name', 'id')->all();
    if ($request || $request->ajax()) {
      return $this->search($request, $cities, $categories_for_search);
    }
    return view('ads.index', compact('ads', 'cities', 'categories_for_search'));
  }
  public function show($slug) {
    $ad = Ad::where('slug', $slug)->first();
    if ($ad) {
      return view('ads.show', compact('ad'));
    }
    return abort(404);
  }
  public function create() {
    $categories = Category::pluck('name', 'id');
    $cities = Ad::getCities();
    return view('ads.create', compact('categories', 'cities'));
  }
  public function store(AdsRequest $request) {
    if ($request->file('images') !== null && count($request->file('images')) > 3) {
      return redirect()->back()->withInput($request->all())->withErrors('Maximum allowed number of images are 3.');
    }
    $ad = $this->createOrUpdate($request);
    return redirect(route('ads.show', $ad->slug))->with('message','Your ad has been created, an admin will approve it after reviewing.');
  }
  public function edit($id) {
    $ad = Ad::findOrFail($id);
    if (Gate::allows('update-ad', $ad)) {
      $categories = Category::pluck('name', 'id');
      $cities = Ad::getCities();
      return view('ads.edit', compact('ad','categories', 'cities'));
    }
    return abort(403);
  }
  public function update($id, AdsRequest $request) {
    if ($request->file('images') !== null && count($request->file('images')) > 3) {
      return redirect()->back()->withInput($request->all())->withErrors('Maximum allowed number of images are 3.');
    }
    $ad = $this->createOrUpdate($request, true, $id);
    return redirect(url()->previous())->with('message','Ad updated successfully.');
  }
  public function delete($id) {
    $ad = Ad::findOrFail($id);
    return view('partials.delete')->with(['entity_type'=>'ads', 'entity_id'=>$ad->id]);
  }
  public function destroy($id) {
    $ad = Ad::findOrFail($id);
    $ad->delete();
    return redirect(route('ads.index'))->with('message', 'Ad deleted.');
  }
  private function createOrUpdate($request, $update = false, $id = null) {
    $ad                   = $update ? Ad::findOrFail($id) : new Ad;
    $ad->slug             = str_slug($request->input('title'), "-");
    $ad->title            = $request->input('title');
    $ad->user_id          = Auth::user()->id;
    $ad->category_id      = $request->input('category_id');
    $ad->price            = $request->input('price');
    $ad->city             = $request->input('city');
    $ad->pull_contact_info= $request->input('pull_contact_info') ? $request->input('pull_contact_info') : 0;
    $ad->description      = $request->input('description');
    $ad->phone            = $request->input('pull_contact_info') ? "" : $request->input('phone');
    $ad->email            = $request->input('pull_contact_info') ? "" : $request->input('email');
    $ad->images           = $update ? implode(';', $request->input('keep_images') ? $request->input('keep_images') : []) : '';
    $ad->approve          = $request->input('approve') ? 1 : 0;
    $ad->featured         = $request->input('featured') ? 1 : 0;
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
      $remove_images = $request->input('removed_images');
      if ($remove_images) {
        foreach ($remove_images as $remove_image) {
          $path = public_path().'/files/ads/'.$ad->id.'/'.$remove_image;
          File::delete($path);
        }
      }
    }
    return $ad;
  }
  private function search($request, $cities, $categories_for_search) {
    $title = $request->get('title');
    $category_id = (int)$request->get('category_id');
    $min_price = (int)$request->get('min_price');
    $max_price = (int)$request->get('max_price');
    $city = $request->get('city');
    $ads = Ad::where('title', 'like', "%$title%");
    if (isset($category_id) && !empty($category_id)) {
      $ads->where('category_id', $category_id);
    }
    if (isset($city) && !empty($city)) {
      $ads->where('city', $city);
    }
    if ($min_price && $max_price) {
      $ads->whereBetween('price', [$min_price, $max_price]);
    }
    if (!empty($ads)) {
        $ads = $ads->approved()->orderBy('created_at', 'desc')->paginate(4)->appends([
            'title' => $title,
            'category_id' => $category_id,
            'city' => $city,
            ]);
        if ($request->ajax()) {
          return view('ads.partials.results', compact('ads', 'request', 'cities', 'categories_for_search'))->render();
        }
        return view('ads.index', compact('ads', 'request', 'cities', 'categories_for_search'))->render();
    } else {
        return false;
    }
  }
}
