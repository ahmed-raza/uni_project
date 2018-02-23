@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $user->name }}</div>

                <div class="panel-body">
                    {!! Form::model($user, ['url'=>route('user.update', $user->id), 'method'=>'PATCH']) !!}
                        @include('users.partials.form', ['edit' => true])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
