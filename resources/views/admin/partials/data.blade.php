@if($entity == 'ads')
<p class="total-ads"><strong>Total Ads:</strong> <span id="total">{{ $results->count() }}</span></p>
<ul>
  @foreach($results as $ad) 
    <li>{!! Html::link(route('ads.show', $ad->slug), $ad->title) !!}</li>
  @endforeach
</ul>
@else
<p class="total-users"><strong>Total Users:</strong> <span id="total">{{ $results->count() }}</span></p>
<ul>
  @foreach($results as $user) 
    <li>{{ $user->name }}</li>
  @endforeach
</ul>
@endif
