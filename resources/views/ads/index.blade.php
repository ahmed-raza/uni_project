@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Ads</h1>
    @foreach($ads as $ad)
      <div class="row">
        <div class="col-lg-12">
          <h3>{{ Html::link(route('ads.show',$ad->id), $ad->title) }}</h3>
          <p>{{ $ad->description }}</p>
        </div>
      </div>
    @endforeach
  </div>

@stop
