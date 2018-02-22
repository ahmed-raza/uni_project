<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      {!! Form::label('title') !!}
      {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {!! Form::label('price') !!}
      {!! Form::number('price', null, ['class'=>'form-control', 'min'=>'1000']) !!}
    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      {!! Form::label('category') !!}
      {!! Form::select('category_id', $categories, $edit ? $ad->category->id : null, ['class'=>'form-control']) !!}
    </div>
  </div>
  <div class="col-lg-6">
    <div class="form-group">
      {!! Form::label('city') !!}
      {!! Form::text('city', null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  {!! Form::label('description') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor']) !!}
</div>
<div class="row">
  <div class="{{ $edit ? 'col-lg-6' : 'col-lg-12' }}">
    <div class="{{ $edit ? '' : 'form-group' }}">
      {!! Form::label('images') !!}
      {!! Form::file('images[]', ['class'=>'form-control', 'multiple'=>true]) !!}
    </div>
  </div>
  @if ($edit && $ad->images)
  <div class="col-lg-6">
    <div class="row">
    @foreach (array_filter(explode(';', $ad->images), 'strlen') as $image)
      <div class="col-lg-4">
        <a href="/files/ads/{{ $ad->id }}/{{ $image }}" target="_blank">
          <img src="/files/ads/{{ $ad->id }}/{{ $image }}" alt="{{ $image }}" height="100" width="100">
        </a><br>
        <a href="javascript:void(0)" id="remove-image" class="text-center">Remove</a>
        {!! Form::hidden('image_names[]', $image) !!}
      </div>
    @endforeach
    </div>
  </div>
  @endif
</div>
<div class="form-group">
  {!! Form::checkbox('pull_contact_info', 1, $edit ? $ad->pull_contact_info : false, ['id'=>'pull_contact_info']) !!}
  {!! Form::label('pull_contact_info', 'Pull my contact info from my profile.') !!}
</div>
<div class="form-group custom-contact-info">
  <div class="row">
    <div class="col-lg-6">
    {!! Form::label('Phone') !!}
    {!! Form::text('phone', null,['class'=>'form-control']) !!}
    </div>
    <div class="col-lg-6">
      {!! Form::label('Email') !!}
      {!! Form::text('email', null,['class'=>'form-control']) !!}
    </div>
  </div>
</div>
@if (Auth::user()->role === 'admin')
  <div class="form-group">
    {!! Form::checkbox('approve', 1, $edit ? $ad->approve : false, ['id'=>'approve']) !!}
    {!! Form::label('approve', 'Approve it.') !!}
  </div>
@endif
<div class="form-group">
  {!! Form::submit('Post', ['class'=>'btn btn-block btn-primary']) !!}
</div>
<script type="text/javascript">
  if($('input#pull_contact_info').is(':checked')) {
    $('.custom-contact-info').hide();
  }
  $('input#pull_contact_info').change(function(){
    $('.custom-contact-info').show();
    if(this.checked) {
      $('.custom-contact-info').hide();
    }
  });
  $('a#remove-image').each(function() {
    $(this).click(function(e) {
      $(this).attr('data-image-name');
      $(this).parents('.col-lg-4').remove();
    });
  });
</script>
