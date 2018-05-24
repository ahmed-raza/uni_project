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
      {!! Form::select('city', $cities, $edit ? $ad->city : null, ['class'=>'form-control']) !!}
    </div>
  </div>
</div>
<div class="form-group">
  {!! Form::label('description') !!}
  {!! Form::textarea('description', null, ['class'=>'ckeditor']) !!}
</div>
<div class="row">
  <div class="{{ $edit ? 'col-lg-6' : 'col-lg-12' }}">
    <div class="{{ $edit && $ad->images !== '' ? '' : 'form-group' }}">
      {!! Form::label('images') !!}
      {!! Form::file('images[]', ['class'=>'form-control', 'multiple'=>true]) !!}
    </div>
  </div>
  @if ($edit && $ad->images)
  <div class="col-lg-6">
    <div class="row">
    @foreach (array_filter(explode(';', $ad->images), 'strlen') as $image)
      <div class="col-lg-4">
        <div class="uploaded-image">
          <a href="/files/ads/{{ $ad->id }}/{{ $image }}" target="_blank">
            <img src="/files/ads/{{ $ad->id }}/{{ $image }}" alt="{{ $image }}" height="100" width="100">
          </a><br>
          <a href="javascript:void(0)" id="remove-image" class="text-center" data-image-name="{{ $image }}">Remove</a>
          {!! Form::hidden('keep_images[]', $image) !!}
        </div>
        {!! Form::hidden('removed_images[]', null, ['id'=>'removed-images']) !!}
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
  <div class="form-group">
    {!! Form::checkbox('featured', 1, $edit ? $ad->featured : false, ['id'=>'featured']) !!}
    {!! Form::label('featured', 'Featured Ad.') !!}
  </div>
@endif
<div class="form-group">
  {!! Form::submit('Post', ['class'=>'btn btn-block btn-primary']) !!}
</div>
