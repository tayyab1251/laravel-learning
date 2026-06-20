@extends('layouts.app')

@section('title', 'My Posts')

@section('content')

@if (session('post_success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Good Job!</strong> {{ session('post_success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<h3 class="text-primary text-center">All Posts</h3>
<table class="table border">
    @if (count($posts) > 0)
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        {{-- @dd($posts) --}}
        @foreach ($posts as $post)
        <tr>
            <td>{{$posts->firstItem() + $loop->index}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->description}}</td>
            <td>
                @if ($post->status == 1)
                <small class="badge rounded-pill text-bg-success">Published</small>
                @else
                <small class="badge rounded-pill text-bg-danger">Draft</small>
                @endif
            </td>
            <td><a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">View</a></td>
            <td><a class="btn btn-secondary" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
            <td>
                <form action="{{route('posts.delete', $post->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    @else()
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between">
                <p class="text-center text-danger fw-bold p-4">No Post Found !</p>
                <a class="btn btn-primary" href="{{route('posts.create')}}">Create New Post</a>

            </div>
        </div>
    </div>
    @endif
</table>
{{$posts->links() }}
@endsection