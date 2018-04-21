<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', $edit ? $user->name : null, ['class'=>'form-control']) !!}
</div>
<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email') !!}
    {!! Form::email('email', $edit ? $user->email : null, ['class'=>'form-control', 'disabled']) !!}
    <p class="help-block">Email cannot be editted.</p>
</div>
<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Phone') !!}
    {!! Form::text('phone', $edit ? $user->phone : null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('Update', ['class'=>'btn btn-warning btn-block']) !!}
</div>