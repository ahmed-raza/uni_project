@extends('layouts.app')

@section('content')

  <div class="container">
    
    <h1>Post an Ad</h1>
      
    {!! Form::open(['url'=>route('ads.store'), 'method'=>'POST', 'enctype'=>'multipart/form-data', 'files'=>true]) !!}
      @include('ads.partials._form', ['edit' => false])
    {!! Form::close() !!}

  </div>

@stop
