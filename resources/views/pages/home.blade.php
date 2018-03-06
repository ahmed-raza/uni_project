@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Welcome to Classifieds Online</h1>
    <div class="row">
      <div class="col-lg-6">
        <fieldset>
          <legend>Categories</legend>
          <div class="row">
            @foreach ($categories->chunk(3) as $items)
              <div class="col-lg-4">
                <ul class="nav">
                  @foreach ($items as $category)
                    <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                  @endforeach
                </ul>
              </div>
            @endforeach
          </div>
        </fieldset>
      </div>
      <div class="col-lg-6">
        @include('ads.partials.search')
      </div>
    </div>
    <div class="ads"></div>
    <h2>Featured Ads</h2>
    <div class="flexslider">
      <ul class="slides">
        <li>
          <img src="sofa.jpg" alt="ad image" height="400">
          <div class="desc">
            <h2><a href="#">Sofa For Sale</a></h2>
            <p>Irure aute id voluptate duis exercitation dolore aliquip est occaecat aliquip sed minim et...</p>
          </div>
        </li>
        <li><img src="sofa2.jpg" alt="ad image" height="200"></li>
      </ul>
    </div>
    <h2>Latest Ads</h2>
    <div class="row">
      <div class="col-lg-4">
        <div class="well">
          <img src="dining.jpg" alt="ad image" height="240">
          <h3><a href="#">Furniture For Sale</a></h3>
          <em>18 December 2017</em>
          <p>Irure aute id voluptate duis exercitation dolore aliquip est occaecat aliquip sed minim et...</p>
          <a href="#">See details</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="well">
          <img src="dining.jpg" alt="ad image" height="240">
          <h3><a href="#">Furniture For Sale</a></h3>
          <em>18 December 2017</em>
          <p>Irure aute id voluptate duis exercitation dolore aliquip est occaecat aliquip sed minim et...</p>
          <a href="#">See details</a>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="well">
          <img src="dining.jpg" alt="ad image" height="240">
          <h3><a href="#">Furniture For Sale</a></h3>
          <em>18 December 2017</em>
          <p>Irure aute id voluptate duis exercitation dolore aliquip est occaecat aliquip sed minim et...</p>
          <a href="#">See details</a>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('input#price-min').change(function(){
        $(this).parents().find('span#price-min').text($(this).val());
      });
      $('input#price-max').change(function(){
        $(this).parents().find('span#price-max').text($(this).val());
      });
      $('.flexslider').flexslider({
        animation: "slide"
      });
    });
  </script>
@stop
