@extends('layouts.main')

@section('title', "Index")

@section('content')
@if (session('sucess'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if(session('fail'))
<div class="alert alert-danger">
    {{ session('fail') }}
</div>
@endif

<div class="container my-4">
    <div class="row">
        <div class="col d-flex justify-content-between">
            <h1 class="text-primary">All Students</h1>
            <a href="students/create" class="btn btn-primary ">Add Student</a>
        </div>
    </div>
</div>
<table class="table border table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Email</th>
            <th>Phone</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>@foreach ($students as $student)
        <tr>
            <td>{{$student->name}}</td>
            @if (empty($student->age))
            <td>N/A</td>
            @else
            <td>{{$student->age}}</td>
            @endif

            <td>{{$student->email}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->city_id}}</td>
            <td>
                <a href="{{route('students.edit', $student->student_id)}}"  class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{route('students.delete', $student->student_id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            {{-- <td><a href="{{route('delete/{{$student->student_id}}')}}" class="btn btn-primary">Edit</a></td> --}}
            {{-- <td><a href="{{$student->student_id}}" class="btn btn-danger">Delete</a></td> --}}
        </tr>
        @endforeach

    </tbody>
</table>
@endsection