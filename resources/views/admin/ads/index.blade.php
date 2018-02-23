@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Ads</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Title</th>
          <th>Posted By</th>
          <th>Category</th>
          <th>Approved</th>
          <th>Created On</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ads as $ad)
          <tr>
            <td>{{ $ad->id }}</td>
            <td>{{ Html::link(route('ads.show',$ad->slug), str_limit($ad->title, 20)) }}</td>
            <td>{{ $ad->user->name }}</td>
            <td>{{ $ad->category->name }}</td>
            <td>{{ $ad->approve ? 'Yes' : 'No' }}</td>
            <td>{{ $ad->created_at }}</td>
            <td>
              {{ Html::link(route('ads.edit', $ad->id), 'Edit') }} | {!! Html::link(route('ads.delete', $ad->id), 'Delete') !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $ads->links() }}
  </div>

@stop
