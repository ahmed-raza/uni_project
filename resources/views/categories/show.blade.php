@extends('layouts.app')

@section('content')

	<div class="container">
		<h1>{{ $category->name }}</h1>
    @if ($ads->isEmpty())
      <p>No ads found.</p>
    @endif
    @foreach($ads as $ad)
    <div class="row ads">
    	@if ($ad->images)
	      <div class="col-lg-3 col-sm-3">
	        <img src="/files/ads/{{ $ad->id }}/{{ explode(';', $ad->images)[0] }}" alt="#" height="140" width="250">
	      </div>
    	@endif
      <div class="{{ $ad->images ? 'col-lg-9 col-sm-9' : 'col-lg-12' }}">
        <h3>{{ Html::link(route('ads.show',$ad->slug), $ad->title) }}</h3>
        <em>{{ $ad->created_at->diffForHumans() }}</em>
        {!! str_limit($ad->description, 200) !!}
      </div>
    </div>
    @endforeach
	</div>

@stop