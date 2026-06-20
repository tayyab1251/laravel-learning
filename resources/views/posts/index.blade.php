@extends('layouts.app')

@section('title', 'My Posts')

@section('content')

@if (session('post_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Good Job!</strong> {{ session('post_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-light mb-0">All Posts</h3>
    <a class="btn btn-primary btn-sm" href="{{route('posts.create')}}">+ Create Post</a>
</div>

@if(count($posts) > 0)
<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col" class="fw-normal">#</th>
                <th scope="col" class="fw-normal">Title</th>
                <th scope="col" class="fw-normal">Description</th>
                <th scope="col" class="fw-normal">Status</th>
                <th scope="col" class="fw-normal text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$posts->firstItem() + $loop->index}}</td>
                <td class="fw-medium">{{$post->title}}</td>
                <td class="text-muted">{{ Str::limit($post->description, 60) }}</td>
                <td>
                    @if ($post->status == 1)
                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Published</span>
                    @else
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Draft</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex gap-1 justify-content-center">
                        <a class="btn btn-outline-primary btn-sm" href="{{route('posts.show', $post->id)}}">View</a>
                        <a class="btn btn-outline-secondary btn-sm" href="{{route('posts.edit', $post->id)}}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-3">
    <small class="text-muted">
        Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} posts
    </small>
    {{ $posts->links() }}
</div>

@else
<div class="text-center py-5">
    <p class="text-muted mb-3">No posts found. Start creating your first post!</p>
    <a class="btn btn-primary" href="{{route('posts.create')}}">+ Create New Post</a>
</div>
@endif

@endsection