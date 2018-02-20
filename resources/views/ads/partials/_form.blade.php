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
<div class="form-group">
  {!! Form::label('images') !!}
  {!! Form::file('images', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::checkbox('contact_info', 1, $edit ? $ad->contact_info : false, ['id'=>'contact_info']) !!}
  {!! Form::label('contact_info', 'Pull my contact info from my profile.') !!}
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
<div class="form-group">
  {!! Form::submit('Post', ['class'=>'btn btn-block btn-primary']) !!}
</div>
<script type="text/javascript">
  if($('input#contact_info').is(':checked')) {
    $('.custom-contact-info').hide();
  }
  $('input#contact_info').change(function(){
    $('.custom-contact-info').show();
    if(this.checked) {
      $('.custom-contact-info').hide();
    }
  });
</script>
