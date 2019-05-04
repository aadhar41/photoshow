@extends('layouts.app')

@section('content')
  @if(count($albums) > 0)
    <?php
      $colcount = count($albums);
  	  $i = 1;
    ?>
    <div id="albums">
      <div class="grid-x">
        @foreach($albums as $album)
          @if($i == $colcount)
            <div class='cell small-4 end'>
               <a href="/albums/{{$album->id}}">
                  <img class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}" width="97%">
                </a>
               <br>
               <h4>{{$album->name}}</h4>
               
          @else
                <div class='cell small-4'>
                    <a href="/albums/{{$album->id}}">
                        <img class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name}}" width="97%">
                    </a>
                    <br>
                    <h4>{{$album->name}}</h4>
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
    <p>No Albums To Display</p>
  @endif

@endsection
