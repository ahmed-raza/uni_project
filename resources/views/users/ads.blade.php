@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Your ads, {{ Auth::user()->name }}</h1>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>Title</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($ads as $ad)
          <tr class="{{ $ad->approve ? 'success' : 'danger' }}">
            <td>{{ Html::link(route('ads.show', $ad->slug), $ad->title) }}</td>
            <td>{!! str_limit($ad->description, 100) !!}</td>
            <td>{{ Html::link(route('ads.edit', $ad->id), 'Edit') }} | Delete</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@stop
