{!! Form::open(['url'=>route('ads.index'), 'id'=>'ads-search']) !!}
  <fieldset>
    <legend>Search</legend>
    <div class="row">
      <div class="col-lg-6">
        {!! Form::label('title') !!}
        {!! Form::text('title', null, [
          'class'=>'form-control',
          'id'=>'title',
          'placeholder'=>'Ads Search..',
          'autocomplete'=>'off'
          ]) !!}
      </div>
      <div class="col-lg-6">
        {!! Form::label('Category') !!}
        {!! Form::select('category_id',
          ['' => '- Select -'] + $categories_for_search,
          null,
          ['class'=>'form-control', 'id'=>'category_id']) !!}
      </div>
    </div>            
    <div class="row">
      <div class="col-lg-6">
        <label for="price-min">Price min: <span id="price-min"></span></label>
        <input type="range" name="price-min" id="price-min" value="200" min="0" max="10000">
      </div>
      <div class="col-lg-6">
        <label for="price-max">Price max: <span id="price-max"></span></label>
        <input type="range" name="price-max" id="price-max" value="200" min="0" max="10000">
      </div>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      {!! Form::select('city', $cities, null, ['class'=>'form-control', 'id'=>'city']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Search', ['class'=>'btn btn-block btn-success']) !!}
    </div>
  </fieldset>
{!! Form::close() !!}
<script type="text/javascript">
  $('#ads-search').submit(function(e){
    e.preventDefault();
    $('#loader').show();
    $('.ads').addClass('overlay');
    var action = $(this).attr('action');
    var title = $(this).find('#title').val();
    var category_id = $(this).find('#category_id').val();
    var city = $(this).find('#city').val();
    var price_min = $(this).find('#price-min').val();
    var price_max = $(this).find('#price-max').val();
    var _token = "{{ csrf_token() }}";
    $.ajax({
      type: 'GET',
      url: action,
      data: {
        _token: _token,
        title: title,
        category_id: category_id,
        city : city,
        price_min : price_min,
        price_max : price_max,
      },
      success: function(data){
        setTimeout(function(){
          $('.ads').html(data);
          $('input#price-min').append(price_min);
          $('#loader').hide();
          $('.ads').removeClass('overlay');
        }, 2000);
      }
    });
  });
</script>