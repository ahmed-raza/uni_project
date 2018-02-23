<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ad;

class CategoriesController extends Controller
{
  public function __construct() {
    $this->middleware('admin', ['except'=>['show']]);
  }
  public function index() {
    $categories = Category::paginate(10);
    return view('admin.categories.index', compact('categories'));
  }
  public function show($id) {
    $category = Category::findOrFail($id);
    $ads = Ad::where('category_id', $category->id)->approved()->get();
    return view('categories.show', compact('category', 'ads'));
  }
  public function store(Request $request) {
    Category::create($request->all());
    return redirect()->back()->with('message', 'Category created.');
  }
  public function update($id, Request $request) {
    $category = Category::findOrFail($id);
    $category->update($request->all());
    return redirect()->back()->with('message', 'Category updated.');
  }
  public function delete($id) {
    $category = Category::findOrFail($id);
    return view('partials.delete')->with(['entity_type'=>'categories', 'entity_id'=>$category->id]);
  }
  public function destroy($id) {
    $category = Category::findOrFail($id);
    $category->delete();
    return redirect(route('admin.dashboard'))->with('message', 'Category deleted.');
  }
}
