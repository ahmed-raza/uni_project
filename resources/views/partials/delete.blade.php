@extends('layouts.app')

@section('content')

  <div class="container">
    {!! Form::open(['url'=>route("$entity_type.destroy", $entity_id), 'method'=>"DELETE"]) !!}
      <p>Are you sure you want to delete this {{ substr_replace($entity_type,'', strrpos($entity_type, 's'), 1) }}?</p>
      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
      {!! Html::link(url()->previous(), 'Cancel') !!}
    {!! Form::close() !!}
  </div>

@stop
