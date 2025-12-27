@extends('layouts.main')
@section('title', 'Add Student')
@section('content')
<form class="border rounded p-4 shadow" method="POST" action="{{route('students.add')}}">
    @csrf
    <h1 class="text-primary text-center">Add Student</h1>
    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name"
            placeholder="Enter your name">
        <small class="text-danger">@error('name') {{$message}} @enderror</small>
    </div>
    <!-- Age -->
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" class="form-control" name="age" value="{{old('age')}}" id="age"
            placeholder="Enter your age">
        <small class="text-danger">
            @error('age'){{$message}}@enderror
        </small>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
            aria-describedby="emailHelp" placeholder="Enter your email">
        <small class="text-danger">@error('email') {{$message}} @enderror</small>
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" value="{{old('phone')}}" name="phone"
            placeholder="Enter your phone number">
        <small class="text-danger">@error('phone') {{$message}} @enderror</small>
    </div>

    <!-- City -->
    <div class="mb-3">
        <label for="city" class="form-label">City</label>

        <select class="form-control" id="city" name="city_id">
            <option value="">Select City</option>
            @foreach ($cities as $city)
            <option value="{{ $city->city_id }}" {{ old('city_id')==$city->city_id ? 'selected' : '' }}>
                {{ $city->name }}
            </option>
            @endforeach
        </select>

        @error('city_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary btn-block w-100">Save Student</button>
</form>
@endsection