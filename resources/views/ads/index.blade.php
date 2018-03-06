@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Ads</h1>
    <div class="row">
      <div class="col-lg-8">
        @if ($ads->isEmpty())
          <p>No ads found.</p>
        @endif
        <div class="ads">        
          @foreach($ads as $ad)
          <div class="row ads__row">
            @if ($ad->images)
              <div class="col-lg-3">
                <img src="/files/ads/{{ $ad->id }}/{{ explode(';', $ad->images)[0] }}" alt="#" height="140" width="200">
              </div>
            @endif
            <div class="{{ $ad->images ? 'col-lg-9' : 'col-lg-12' }}">
              <h3>{{ Html::link(route('ads.show',$ad->slug), $ad->title) }}</h3>
              <em>{{ $ad->created_at->diffForHumans() }}</em>
              {!! str_limit($ad->description, 200) !!}
            </div>
          </div>
          @endforeach
          {{ $ads->links() }}
        </div>
      </div>
      <div class="col-lg-4">
        @include('ads.partials.search')
      </div>
    </div>
  </div>

@stop
