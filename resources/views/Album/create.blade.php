@extends('layouts.layout')
@section('title')
    Add Album
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

    <form method="post" action="{{route('StoreAlbum')}}" class="container mt-3">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1" class="mb-3">Album Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Album name">

        </div>

        <button type="submit" class="btn btn-primary mt-3" >Add New Album</button>
    </form>
@endsection
