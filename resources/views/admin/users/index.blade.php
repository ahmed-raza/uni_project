@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Users</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
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
            <td>{{ $key+1 }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role }}</td>
            <td>{{ count($user->ads) }}</td>
            <td><a href="#">Edit</a> | <a href="#">Delete</a></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $users->links() }}
  </div>

@stop
