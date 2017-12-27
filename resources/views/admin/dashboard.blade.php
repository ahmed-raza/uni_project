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
    <div class="col-lg-4">
      <div class="well">
        <h3>Ads</h3>
        <a href="#" class="btn btn-primary btn-xs">Post Ad</a>
        <ul class="nav">
          <li><a href="#">Furniture For sale <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Ut in fugiat irure. <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Elit nisi non. <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Consectetur ut in. <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Dolor do sunt occaecat veniam. <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Ea laborum magna commodo. <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
        </ul>
        <a href="#" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="well">
        <h3>Users</h3>
        <a href="#" class="btn btn-primary btn-xs">Add User</a>
        <ul class="nav">
          <li><a href="#">Ahmed <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Raza <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Qasim <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Ali <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Salma <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Saleem <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
        </ul>
        <a href="#" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="well">
        <h3>Categories</h3>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#categoryModal" data-whatever="@mdo">Add Category</button>
        <ul class="nav">
          <li><a href="#">Real Estate <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Furniture <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Cars <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Motorbikes <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Home Appliances <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
          <li><a href="#">Electronics <button class="btn btn-xs btn-warning pull-right">Delete</button><button class="btn btn-xs btn-warning pull-right">Edit</button></a></li>
        </ul>
        <a href="{{ route('category.index') }}" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
  </div>
</div>


{!! Form::open(['url'=>route('category.store')]) !!}
  @include('admin.categories.partials._form', ['edit'=>false, 'title'=>'Add Category'])
{!! Form::close() !!}

@stop
