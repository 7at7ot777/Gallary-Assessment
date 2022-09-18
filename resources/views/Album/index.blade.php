@extends('layouts.layout')
@section('title')
    All Albums
@endsection

@section('content')
    @if(session('message'))
        <div class="alert alert-success" role="alert">
           {{session('message')}}
        </div>
    @endif


    <table class="table container">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Album Name</th>
            <th scope="col">Procedure</th>

        </tr>
        </thead>
        <tbody> <?php $i = 0 ?>
        @if(isset($albums))
            @foreach($albums as $album)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$album->name}}</td>
                    <td>
                        <a href="{{route('image.index' ,$album->id)}}">
                            <button type="button" class="btn btn-primary">View Album</button>
                        </a>
                        <a href="{{route('EditAlbum',$album->id)}}">
                            <button type="button" class="btn btn-warning">Edit Album</button>
                        </a>
                        <a href="{{route('DeleteAlbum',$album->id)}}">
                            <button type="button" class="btn btn-danger" onclick="popUp()">Delete Options</button>
                        </a>

                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
