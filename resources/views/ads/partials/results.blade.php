@if ($ads->isEmpty())
  <p>No ads found.</p>
@endif
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
<div class="pagination">
  {!! $ads->render() !!}
</div>
<script type="text/javascript">
  $(function() {
    $('.pagination a').click(function(e) {
        e.preventDefault();
        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="images/throbber.gif" />');
        var url = $(this).attr('href');
        getAds(url);
        window.history.pushState("", "", url);
    });
    function getAds(url) {
        $.ajax({
            url : url
        }).done(function (data) {
          $('.ads').attr('id', 'results');
          $('#results').html(data);
        }).fail(function () {
            alert('Ads could not be loaded.');
        });
    }
  });
</script>