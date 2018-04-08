{!! Form::open(['url'=>route('ads.index'), 'id'=>'ads-search', 'method'=>'GET']) !!}
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
        <div class="price-range">
          <label for="price-min">Price min: <span id="price-val">{{ app('request')->get('price_min') ? app('request')->get('price_min') : 0 }}</span></label>
          {!! Form::range('price_min', 0, ['id'=>'price-min', 'min'=>'0', 'max'=>'10000', 'step'=>'500']) !!}
        </div>
      </div>
      <div class="col-lg-6">
        <div class="price-range">
          <label for="price-max">Price max: <span id="price-val">{{ app('request')->get('price_min') ? app('request')->get('price_max') : 10000 }}</span></label>
          {!! Form::range('price_max', 10000, ['id'=>'price-max', 'min'=>'0', 'max'=>'10000', 'step'=>'500']) !!}
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="city">City</label>
      {!! Form::select('city', [''=>'- Select -']+$cities, null, ['class'=>'form-control', 'id'=>'city']) !!}
    </div>
    <div class="form-group">
      {!! Form::submit('Search', ['class'=>'btn btn-block btn-success']) !!}
    </div>
  </fieldset>
{!! Form::close() !!}
<script type="text/javascript">
  $('input[type="range"]').on('input',function(e){
    $(this).parents('.price-range').find('#price-val').html($(e.target).val());
  });
  @if(\Request::route()->getName() == 'ads.index')
  $('#ads-search').submit(function(e){
    e.preventDefault();
    $('#loader').show();
    var action = $(this).attr('action');
    var title = $(this).find('#title').val();
    var category_id = $(this).find('#category_id').val();
    var city = $(this).find('#city').val();
    var min_price = $(this).find('#price-min').val();
    var max_price = $(this).find('#price-max').val();
    var _token = "{{ csrf_token() }}";
    $.ajax({
      type: 'GET',
      url: action,
      data: {
        _token: _token,
        title: title,
        category_id: category_id,
        city : city,
        min_price : min_price,
        max_price : max_price,
      },
      success: function(data){
        setTimeout(function(){
          $('.ads').html(data);
          $('#loader').hide();
        }, 2000);
      }
    });
  });
  @endif
</script>
