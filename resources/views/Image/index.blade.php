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
            <th scope="col">Image Name</th>
            <th scope="col">Image</th>
            <th scope="col">Procedure</th>

        </tr>
        </thead>
        <tbody> <?php $i = 0 ?>
        @if(isset($images))
            @foreach($images as $image)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$image->name}}</td>
             <td>     <img src="{{asset('storage\images\\') . $image->image}}" width="300"> </td>
                    <td>
                        <a href="{{asset('storage\images\\') . $image->image}}" target="_blank">
                            <button type="button" class="btn btn-primary">View Photo</button>
                        </a>.

                        <a href="{{route('image.destroy',$image->id)}}">
                            <button type="button" class="btn btn-danger">Delete Photo</button>
                        </a>

                    </td>

                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
@endsection
