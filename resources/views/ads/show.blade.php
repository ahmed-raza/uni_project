@extends('layouts.app')

@section('content')
  
  <div class="container">
    <h1>{{ $ad->title }}</h1>
    <p>{{ $ad->description }}</p>
  </div>

@stop
