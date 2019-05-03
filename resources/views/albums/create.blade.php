@extends('layouts.app')

@section('content')
    <h3>Create Album</h3>
    {{ Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'files'=>'true' ]) }}
        {{ Form::text('name', '', ['placeholder'=>'Album Name']) }}
        {{ Form::text('description', '', ['placeholder'=>'Album Description']) }}
        {{ Form::file('cover_image') }}
        {{ Form::submit('submit') }}
    {{ Form::close() }}
@endsection
