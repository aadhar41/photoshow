@extends('layouts.app')

@section('content')
    <h1>{{ $album->name }}</h1>
    <a href="/" class="button secondary">Go Back</a>
<a href="/photos/create/{{ $album->id }}" class="button">Upload Photo To Album</a>
<hr>

@if(count($album->photos) > 0)
    <?php
      $colcount = count($album->photos);
  	  $i = 1;
    ?>
    <div id="photos">
      <div class="grid-x">
        @foreach($album->photos as $photo)
          @if($i == $colcount)
            <div class='cell small-4 end'>
               <a href="/photos/{{$photo->id}}">
                  <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" width="97%">
                </a>
               <br>
               <h4>{{$photo->title}}</h4>
               
          @else
                <div class='cell small-4'>
                <a href="/photos/{{$photo->id}}">
                    <img class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}" width="97%">
                    </a>
                    <br>
                    <h4>{{$photo->title}}</h4>
          @endif
        	@if($i % 3 == 0)
                </div>
            </div>
        
            <div class="grid-x text-center">
        	@else
            </div>
          @endif
        	<?php $i++; ?>
        @endforeach
      </div>
    </div>
  @else
    <p>No Photos To Display</p>
  @endif

@endsection

{{--  --}}

