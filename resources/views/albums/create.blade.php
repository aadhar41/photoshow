@extends('layouts.app')

@section('content')
    <h3>Create Album</h3>
    {{ Form::open(['action' => 'AlbumsController@store','method' => 'POST', 'files'=>'true' ]) }}
        {{ Form::text('name', '', ['placeholder'=>'Album Name']) }}
        {{ Form::textarea('description', '', ['placeholder'=>'Album Description','rows'=>4]) }}
        {{ Form::file('cover_image') }}
        {{ Form::submit('submit',['class'=>'button primary']) }}
    {{ Form::close() }}
@endsection

