@extends('layouts.app')

@section('content')

  <div class="container">
    <h1>Categories</h1>
    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#categoryModal">Add Category</button>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Total Ads</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ count($category->ads) }}</td>
            <td>
              {!! Html::link('#', 'Edit', [
                'id'          =>'edit',
                'data-name'   =>$category->name,
                'data-id'     =>$category->id,
                'data-toggle' =>'modal',
                'data-target' =>'#categoryEditModal',
                ]) !!} | 
              {!! Html::link(route('categories.delete', $category->id), 'Delete') !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $categories->links() }}
  </div>

{!! Form::open(['url'=>route('categories.store'), 'method'=>'POST']) !!}
  @include('admin.categories.partials._form', ['edit'=>false, 'title'=>'Add Category'])
{!! Form::close() !!}

<form action="{{ route('categories.update', 0) }}" id="category-edit" method="POST">
  <input name="_method" type="hidden" value="PATCH">
  {!! csrf_field() !!}
  @include('admin.categories.partials._form', ['edit'=>true, 'title'=>'Edit Category'])
</form>
@stop
