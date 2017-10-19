<div class="form-group">
  {!! Form::label('title') !!}
  {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>

<div class="row">
  <div class="col-lg-6">
    <div class="form-group">
      {!! Form::label('category') !!}
      {!! Form::text('category', null, ['class'=>'form-control']) !!}
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
  {!! Form::submit('Post', ['class'=>'btn btn-block btn-primary']) !!}
</div>
