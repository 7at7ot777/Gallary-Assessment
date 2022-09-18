@extends('layouts.layout')
@section('title')
    Delete Options
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif

    <h3>if you want to delete the album with it's photo's press here</h3> <br>
    <a href="{{route('DeleteAlbum',$album->id)}}">
        <button type="button" class="btn btn-danger" onclick="popUp()">Delete Options</button>
    </a>

    <h3>if you want to move the images to another album please select the album </h3> <br>
    <label for="cars">Choose an Album:</label>
<form method="post" action="{{route('moveImages',$album->id)}}"
    <select name="album_id" id="cars">
        @if(isset($albums))
            @foreach($albums as $album)
                <option value="{{$album->id}}" name="album_id">{{$album->name}}</option>
            @endforeach
        @endif
    </select>
@endsection
