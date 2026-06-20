@extends('layouts.app')

@section('title', 'Create New Post')

@section('content')
{{-- --}}
{{-- alert --}}

@if (session('post_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Good Job!</strong> {{ session('post_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif


<form class="border border-dark p-4" method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
    <h3 class="text-primary text-center">Create New Post</h3>
    <div class="mb-3">
        @csrf
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" placeholder="Enter post title"
            class="form-control @error('title') is-invalid @enderror" id="title" value="{{old('title')}}">
        @error('title')
        <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Post Thumbnail</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
            placeholder="Choose image...." value="{{old('image')}}" id="image">

        @error('image')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
            placeholder="Enter description...." value="{{old('description')}}" id="description" cols="20"
            rows="5"></textarea>
        @error('description')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection