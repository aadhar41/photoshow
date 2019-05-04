@extends('layouts.app')

@section('content')
    <h3>{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>
    <a href="/albums/{{ $photo->album_id }}" class='button primary' >Back To Gallary</a>
    <hr>
    
    <img class="thimbnail" src="/storage/photos/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->title }}" width="60%">
    <br><br>
    {{-- {{ Form::open(['url' => ['destory', $photo->id]]) }}
        
        {{ Form::hidden('_method','DELETE') }}
        
        {{ Form::submit('Delete Photo',['class'=>'button alert']) }}
    {{ Form::close() }} --}}


    {{ Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST', 'class' => '', 'onsubmit' => 'return confirm("Are you sure??")']) }}
    
        {{ FORM::hidden('_method','DELETE') }}
        {{ Form::submit('Delete',['class'=>'button alert']) }}
    
    {{ Form::close() }}

    <hr>
    <small>Size : {{ $photo->size }} </small>
@endsection