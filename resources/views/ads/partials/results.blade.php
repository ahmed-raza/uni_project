@if ($ads->isEmpty())
  <p>No ads found.</p>
@endif
@foreach($ads as $ad)
<div class="row ads__row">
  @if ($ad->images)
    <div class="col-lg-4 ad-image">
      <img src="/files/ads/{{ $ad->id }}/{{ explode(';', $ad->images)[0] }}" alt="#" height="140" width="200">
    </div>
  @endif
  <div class="{{ $ad->images ? 'col-lg-8' : 'col-lg-12' }}">
    <h3>{{ Html::link(route('ads.show',$ad->slug), $ad->title) }}</h3>
    <em>{{ $ad->created_at->diffForHumans() }}</em>
    {!! str_limit($ad->description, 200) !!}
  </div>
</div>
@endforeach
<div class="pagination">
  {!! $ads->render() !!}
</div>
