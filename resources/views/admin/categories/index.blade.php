@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Categories</h1>
    <table class="table table-hovered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $key => $category)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $category->name }}</td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@stop
