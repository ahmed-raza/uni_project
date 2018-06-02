@extends('layouts.app')

@section('content')

<div class="container">
  <h1>Profile</h1>
  {!! Html::link(route('user.edit', $user->id), 'Edit Profile') !!}
  <p><strong>Name: </strong>{{ $user->name }}</p>
  <p><strong>Email: </strong>{{ $user->email }}</p>
  <p><strong>Phone: </strong>{{ $user->phone }}</p>
  @include('users.partials.ads')
</div>

@stop
