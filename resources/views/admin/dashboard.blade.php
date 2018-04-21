@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Admin Dashboard</h1>
  <div class="row">
    <div class="col-lg-6">
      <fieldset>
        <legend>Overall Analysis</legend>
        <p class="total-users"><strong>Total Users:</strong> <span id="total">0</span></p>
        <p class="total-ads"><strong>Total Ads:</strong> <span id="total">0</span></p>
      </fieldset>
    </div>
    <div class="col-lg-6">
      <fieldset>
        <legend>Overall Analysis for the Day</legend>
        <p class="total-users-today"><strong>Users registered today:</strong> <span id="total">0</span></p>
        <p class="total-ads-today"><strong>Ads posted today:</strong> <span id="total">0</span></p>
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
<script type="text/javascript">
  $.getJSON('/api/dashboard/data', function(result){
    $('.total-users-today #total').text(result.todays_users);
    $('.total-ads-today #total').text(result.todays_ads);
    $('.total-ads #total').text(result.total_ads);
    $('.total-users #total').text(result.total_users);
  });
</script>
@stop
