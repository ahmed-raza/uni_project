@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Ads</h1>
    @foreach($ads as $ad)
      <div class="row">
        <div class="col-lg-12">
          <h3>{{ Html::link(route('ads.show',$ad->slug), $ad->title) }}</h3>
          {!! str_limit($ad->description, 200) !!}
        </div>
      </div>
    @endforeach
  </div>

@stop
