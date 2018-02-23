@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Ads</h1>
    <div class="row">
      <div class="col-lg-9">
        @if ($ads->isEmpty())
          <p>No ads found.</p>
        @endif
        @foreach($ads as $ad)
        <div class="row ads">
          <div class="col-lg-3">
            <img src="dining.jpg" alt="#" height="140" width="200">
          </div>
          <div class="col-lg-9">
            <h3>{{ Html::link(route('ads.show',$ad->slug), $ad->title) }}</h3>
            <em>{{ $ad->created_at->diffForHumans() }}</em>
            {!! str_limit($ad->description, 200) !!}
          </div>
        </div>
        @endforeach
      </div>
      <div class="col-lg-3">
        <fieldset>
          <legend>Search</legend>
          <form action="#">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" placeholder="Title" class="form-control">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Category</label>
                  <select name="category" id="category" class="form-control">
                    <option value="_none">Category</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Vehicles">Vehicles</option>
                    <option value="Books">Books</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="form-group">            
              <div class="row">
                <div class="col-lg-6">
                  <label for="price-min">Price min: <span id="price-min"></span></label>
                  <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
                </div>
                <div class="col-lg-6">
                  <label for="price-max">Price max: <span id="price-max"></span></label>
                  <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="city">City</label>
              <select name="city" id="city" class="form-control">
                <option value="_none">Select City</option>
                <option value="lahore">Lahore</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary btn-block" value="Search">
            </div>
          </form>
        </fieldset>
      </div>
    </div>
  </div>

@stop
