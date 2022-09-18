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
<div class="container">
    <h5>if you want to delete the album with it's photo's press here</h5> <br>
    <a href="{{route('DeleteAlbum',$album->id)}}">
        <button type="button" class="btn btn-danger" onclick="popUp()">Delete Album</button>
    </a>
    <br> <br>
    <h5>if you want to move the images to another album please select the album </h5> <br>
    <label for="cars">Choose an Album:</label>
<form method="post" action="{{route('Album.moveImages',$album->id)}}">
@csrf

    <select name="album_id" id="cars">
        @if(isset($albums))
            @foreach($albums as $album)
                <option value="{{$album->id}}" name="album_id">{{$album->name}}</option>
            @endforeach
        @endif
    </select>
<br><br>
    <button type="submit" class="btn btn-success">Change Album</button>
</form>
</div>
@endsection
