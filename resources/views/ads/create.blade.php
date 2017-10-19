@extends('layouts.app')

@section('content')

  <div class="container">
    
    <h1>Post an Ad</h1>
      
    {!! Form::open(['url'=>route('ads.store'), 'method'=>'POST']) !!}
      @include('ads.partials._form')
    {!! Form::close() !!}

  </div>

@stop
