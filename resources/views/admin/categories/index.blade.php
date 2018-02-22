@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Categories</h1>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#categoryModal">Add Category</button>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Total Ads</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $key => $category)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ count($category->ads) }}</td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

{!! Form::open(['url'=>route('category.store'), 'method'=>'POST']) !!}
  @include('admin.categories.partials._form', ['edit'=>false, 'title'=>'Add Category'])
{!! Form::close() !!}

@stop
