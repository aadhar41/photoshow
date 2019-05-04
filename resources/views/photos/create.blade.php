@extends('layouts.app')

@section('content')
    <h3>Upload Photo</h3>
    {{ Form::open(['action' => 'PhotosController@store','method' => 'POST', 'files'=>'true' ]) }}
        {{ Form::text('title', '', ['placeholder'=>'Photo Title']) }}
        {{ Form::textarea('description', '', ['placeholder'=>'Photo Description','rows'=>4]) }}
        {{ Form::hidden('album_id',$album_id) }}
        {{ Form::file('photo') }}
        {{ Form::submit('submit',['class'=>'button primary']) }}
    {{ Form::close() }}
@endsection

