@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Admin Dashboard</h1>
  <div class="row">
    <div class="col-lg-6">
      <fieldset>
        <legend>Overall Analysis</legend>
        <p><strong>Total Users:</strong> 1024</p>
        <p><strong>Total Ads:</strong> 7863</p>
      </fieldset>
    </div>
    <div class="col-lg-6">
      <fieldset>
        <legend>Overall Analysis for the Day</legend>
        <p><strong>Total Users today:</strong> 25</p>
        <p><strong>Total Ads posted today:</strong> 68</p>
      </fieldset>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 ads">
      <div class="well">
        <h3>Ads</h3>
        <a href="#" class="btn btn-primary btn-xs">Post Ad</a>
        <ul class="nav">
          <li><a href="#">Furniture For sale</a></li>
          <li><a href="#">Ut in fugiat irure.</a></li>
          <li><a href="#">Elit nisi non.</a></li>
          <li><a href="#">Consectetur ut in.</a></li>
          <li><a href="#">Dolor do sunt occaecat veniam.</a></li>
          <li><a href="#">Ea laborum magna commodo.</a></li>
        </ul>
        <a href="#" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
    <div class="col-lg-4 users">
      <div class="well">
        <h3>Users</h3>
        <a href="#" class="btn btn-primary btn-xs">Add User</a>
        <ul class="nav">
          @foreach ($users as $user)
            <li><a href="#">{{ $user->name }}</a></li>
          @endforeach
        </ul>
        <a href="#" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
    <div class="col-lg-4 categories">
      <div class="well">
        <h3>Categories</h3>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#categoryModal">Add Category</button>
        <ul class="nav">
          @foreach ($categories as $category)
          <li><a href="#">{{ $category->name }}</a></li>
          @endforeach
        </ul>
        <a href="{{ route('category.index') }}" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
  </div>
</div>


{!! Form::open(['url'=>route('category.store'), 'method'=>'POST']) !!}
  @include('admin.categories.partials._form', ['edit'=>false, 'title'=>'Add Category'])
{!! Form::close() !!}

@stop
