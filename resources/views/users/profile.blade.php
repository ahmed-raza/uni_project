@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Profile</h1>
  <p>{{ $user->name }}</p>
  <p>{{ $user->email }}</p>
  <p>{{ $user->role }}</p>
</div>

@stop
