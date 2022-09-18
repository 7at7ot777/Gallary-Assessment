@extends('layouts.layout')
@section('title')
    Register
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

    <form action="{{url('checkRegister')}}" method="post" class="container">
        @csrf
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter your name">

        </div>
        <div class="form-group mt-3">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                   placeholder="Enter email">

        </div>
        <div class="form-group mt-3">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                   placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
