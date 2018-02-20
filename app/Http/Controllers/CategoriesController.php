<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
  public function index() {
    $categories = Category::all();
    return view('admin.categories.index', compact('categories'));
  }
  public function store(Request $request) {
    Category::create($request->all());
    return redirect()->back()->with('message', 'Category created.');
  }
  public function update($id, Request $request) {
    $category = Category::find($id);
    $category->update($request->all());
    return redirect()->back()->with('message', 'Category created.');
  }
}
