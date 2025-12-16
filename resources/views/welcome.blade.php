@extends('layouts.main')

{{-- THIS IS OUR TITLE THAT WE ARE ADDIND DYNAMICALLY ACCORDING TO EACH PAGE --}}
@section('title')
    Welcome Page!
@endsection

@php
    $fruits = ["Apple","Banana","PineApple"];
    $user = "Tayyab";
@endphp


@section('content')
    <p>This is dynamic content bruhhh</p>
@endsection
    <script>
        var fruits = @json($fruits);
        var user = @json($user);

        fruits.forEach(function(element  ) {
            console.log(element);
        });
        // console.log(fruits);
        console.log(user);
    </script>

{{-- Display data that we received from controller for welcome page --}}
{{$message}}
