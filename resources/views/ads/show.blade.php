@extends('layouts.app')

@section('content')
  
  <div class="container">
    <h1>{{ $ad->title }}</h1>
    <div class="row">
    	<div class="col-lg-8">
		    {!! $ad->description !!}
		    @if($ad->images)
	    		<p><h4>View attached images:</h4></p>
		    	<div class="row">
		    		@foreach(array_filter(explode(';', $ad->images), 'strlen') as $image)
							<div class="col-lg-4">
								<img src="/files/ads/{{ $ad->id }}/{{ $image }}" alt="{{ $ad->title }}" width="230" height="150">
							</div>
		    		@endforeach
		    	</div>
		    @endif
    	</div>
    	<div class="col-lg-4">
    		<div class="well">
    			<fieldset>
    				<legend>Ad Details</legend>
				    <p><strong>Location: </strong>{!! $ad->city !!}</p>
				    <p><strong>Price: </strong>{!! $ad->price !!} PKR</p>
				    <p><strong>Category: </strong>{!! Html::link(route('categories.show', $ad->category->id), $ad->category->name) !!}</p>
				    <label>Contact details:</label>
				    @if($ad->pull_contact_info)
							@if($ad->user->phone)<p><strong>Phone: </strong>{{ $ad->user->phone }}</p>@endif
							<p><strong>Email: </strong>{{ $ad->user->email }}</p>
				    @else
							<p><strong>Phone: </strong>{{ $ad->phone }}</p>
							<p><strong>Email: </strong>{{ $ad->email }}</p>
				    @endif
    			</fieldset>
    		</div>
    	</div>
    </div>
  </div>

@stop
