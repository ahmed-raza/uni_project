@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Welcome to Classifieds Online</h1>
    <div class="row">
      <div class="col-lg-6">
        @if($categories)
          <fieldset>
            <legend>Categories</legend>
            <div class="row">
              @foreach ($categories->chunk(6) as $items)
                <div class="col-lg-4 col-sm-4">
                  <ul class="nav">
                    @foreach ($items as $category)
                      <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></li>
                    @endforeach
                  </ul>
                </div>
              @endforeach
            </div>
          </fieldset>
        @endif
      </div>
      <div class="col-lg-6">
        @include('ads.partials.search')
      </div>
    </div>
    @unless($featured_ads->isEmpty())
      <h2>Featured Ads</h2>
      <div class="flexslider">
        <ul class="slides">
          @foreach($featured_ads as $featured_ad)
          <li>
            <img src="/files/ads/{{ $featured_ad->id }}/{{ explode(';', $featured_ad->images)[0] }}" alt="ad image" height="400">
            <div class="desc">
              <h2>{!! Html::link(route('ads.show', $featured_ad->slug), $featured_ad->title) !!}</h2>
              {!! str_limit($featured_ad->description, 80) !!}
            </div>
          </li>
          @endforeach
        </ul>
      </div>
    @endunless
    @unless($latest_ads->isEmpty())
      <h2>Latest Ads</h2>
      <div class="row latest-ads">
        @foreach($latest_ads as $ad)
          <div class="col-lg-4 col-sm-6">
            <div class="well">
              @if($ad->images)
                <img src="/files/ads/{{ $ad->id }}/{{ explode(';', $ad->images)[0] }}" alt="{{ $ad->title }}" width="320">
              @endif
              <h3>{!! Html::link(route('ads.show', $ad->slug), $ad->title) !!}</h3>
              <em>{{ $ad->created_at->format('d F Y h:i a') }}</em>
              {!! str_limit($ad->description, $ad->images ? 200 : 350) !!}
              {!! Html::link(route('ads.show', $ad->slug),'See details') !!}
            </div>
          </div>
        @endforeach
      </div>
    @endunless
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
