@extends('layouts.app')

@section('content')

  <div class="container">

    <h1>Edit {{ $ad->title }}</h1>

    {!! Form::model($ad,['url'=>route('ads.update',$ad->id),'method'=>'PATCH','enctype'=>'multipart/form-data','files'=>true]) !!}
      @include('ads.partials._form', ['edit' => true])
    {!! Form::close() !!}

  </div>

@stop
