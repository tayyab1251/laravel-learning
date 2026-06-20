@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')

@if (session('post_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Good Job!</strong> {{ session('post_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h3 class="fw-light mb-4">Edit Post</h3>
                
                <form method="POST" action="{{route('posts.update', $post->id)}}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label fw-medium">Title</label>
                        <input type="text" name="title" placeholder="Enter post title"
                            class="form-control @error('title') is-invalid @enderror" 
                            id="title" value="{{$post->title}}">
                        @error('title')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="form-label fw-medium">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            placeholder="Enter description..." id="description" rows="6">{{$post->description}}</textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Update</button>
                        <a href="{{route('posts.index')}}" class="btn btn-outline-secondary px-4">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection