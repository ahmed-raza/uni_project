@extends('layouts.app')

@section('content')

  <div class="container">
    {!! Form::open(['url'=>route("$entity_type.destroy", $entity_id), 'method'=>"DELETE"]) !!}
      <p>Are you sure you want to delete this?</p>
      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
      {!! Html::link(url()->previous(), 'Cancel') !!}
    {!! Form::close() !!}
  </div>

@stop
