@extends('layouts.layout')
@section('title')
    Create Image
@endsection
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger container">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{route('store')}}" class="container mt-3"  enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="mb-3">image Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Album name">
        <br>
            <label for="img">Select image</label>
            <br> <br>
            <input type="file" id="img" name="image" accept="image/*">
            <br> <br>
            <label for="cars">Choose an Album:</label>

            <select name="album_id" id="cars">
                @if(isset($albums))
                    @foreach($albums as $album)
                <option value="{{$album->id}}" name="album_id">{{$album->name}}</option>
                    @endforeach
                @endif
            </select>

        </div>

        <button type="submit" class="btn btn-primary mt-3" >Add New Album</button>
    </form>
@endsection
