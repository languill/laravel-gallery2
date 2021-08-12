@extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">My Gallery</h1>
        <div class="row">
            @foreach($imagesInView as $image)
                <div class="col-md-3 gallery-item">
                    <div>
                        <img src="{{$image->image}}" class="img-thumbnail">
                    </div>

                    <a href="/show/{{$image->id}}" class="my-button btn btn-info btn-block">Show</a>
                    <a href="/edit/{{$image->id}}" class=" my-button btn btn-warning btn-block">Edit</a>
                    <a href="/delete/{{$image->id}}" class="my-button btn btn-danger btn-block" onclick="return confirm('Are you sure?')">Delete</a>
                </div>
            @endforeach
        </
@endsection
