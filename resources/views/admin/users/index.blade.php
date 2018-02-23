@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Users</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Total Ads</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $key => $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ count($user->ads) }}</td>
            <td>{!! Html::link(route('user.edit', $user->id), 'Edit') !!}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
  </div>

@stop
