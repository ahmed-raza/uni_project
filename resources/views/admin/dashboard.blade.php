@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Admin Dashboard</h1>
  <div class="row analysis">
    <div class="col-lg-6">
      <fieldset>
        <legend>Analysis of Ads</legend>
        {!! Form::open(['url'=>'#', 'method'=>'POST', 'id'=>'dashboad-ads-form']) !!}
          <input type="hidden" id="entity" value="ads">
          <select name="days" id="ads-days" class="form-control ads-days">
            <option value="">- Select -</option>
            <option value="today">Today</option>
            <option value="7">Last 7 days</option>
            <option value="30">Last Month</option>
          </select>
        {!! Form::close() !!}
        <div class="results">
          <p class="total-ads"><strong>Total Ads:</strong> <span id="total">{{ $total_ads }}</span></p>
        </div>
      </fieldset>
    </div>
    <div class="col-lg-6">
      <fieldset>
        <legend>Analysis of Users</legend>
        {!! Form::open(['url'=>'#', 'method'=>'POST', 'id'=>'dashboad-users-form']) !!}
          <input type="hidden" id="entity" value="users">
          <select name="days" id="users-days" class="form-control users-days">
            <option value="">- Select -</option>
            <option value="today">Today</option>
            <option value="7">Last 7 days</option>
            <option value="30">Last Month</option>
          </select>
        {!! Form::close() !!}
        <div class="results">
          <p class="total-users"><strong>Total Users:</strong> <span id="total">{{ $total_users }}</span></p>
        </div>
      </fieldset>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 ads">
      <div class="well">
        <h3>Ads</h3>
        <a href="{{ route('ads.create') }}" class="btn btn-primary btn-xs">Post Ad</a>
        <ul class="nav">
          @foreach ($ads as $ad)
            <li>{{ Html::link(route('ads.show',$ad->slug), str_limit($ad->title, 20)) }}</li>
          @endforeach
        </ul>
        <a href="{{ route('admin.ads') }}" class="btn btn-sm btn-success">View All</a>
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
        <a href="{{ route('admin.users') }}" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
    <div class="col-lg-4 categories">
      <div class="well">
        <h3>Categories</h3>
        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#categoryModal">Add Category</button>
        <ul class="nav">
          @foreach ($categories as $category)
          <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
          @endforeach
        </ul>
        <a href="{{ route('categories.index') }}" class="btn btn-sm btn-success">View All</a>
      </div>
    </div>
  </div>
</div>

{!! Form::open(['url'=>route('categories.store'), 'method'=>'POST']) !!}
  @include('admin.categories.partials._form', ['edit'=>false, 'title'=>'Add Category'])
{!! Form::close() !!}
@stop
