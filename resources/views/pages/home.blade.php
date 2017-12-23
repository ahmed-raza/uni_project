@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Welcome to Classifieds Online</h1>
    <div class="row">
      <div class="col-lg-6">
        <fieldset>
          <legend>Categories</legend>
          <div class="row">
            <div class="col-lg-6">
              <ul class="nav">
                <li><a href="#">Real Estate</a></li>
                <li><a href="#">Furniture</a></li>
                <li><a href="#">Cars</a></li>
                <li><a href="#">Motorbikes</a></li>
                <li><a href="#">Home Appliances</a></li>
                <li><a href="#">Electronics</a></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul class="nav">
                <li><a href="#">Laptops</a></li>
                <li><a href="#">Computers</a></li>
                <li><a href="#">Gaming</a></li>
                <li><a href="#">Tutors</a></li>
                <li><a href="#">Pets</a></li>
                <li><a href="#">Books</a></li>
              </ul>
            </div>
          </div>
        </fieldset>
      </div>
      <div class="col-lg-6">
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
