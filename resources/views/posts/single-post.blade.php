@extends('layouts.app')

@section('title', $post->title)

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <h1 class="h3 fw-light mb-0">{{$post->title}}</h1>
                    @if ($post->status == 1)
                    <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill">Published</span>
                    @else
                    <span class="badge bg-danger-subtle text-danger px-3 py-2 rounded-pill">Draft</span>
                    @endif
                </div>
                
                <hr>
                
                <div class="mb-4">
                    <p class="text-muted" style="white-space: pre-wrap;">{{$post->description}}</p>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        <span class="fw-medium">Created:</span> {{$post->created_at->format('M d, Y')}}
                        @if($post->created_at != $post->updated_at)
                        <span class="mx-2">·</span>
                        <span class="fw-medium">Updated:</span> {{$post->updated_at->format('M d, Y')}}
                        @endif
                    </small>
                    <button class="btn btn-outline-secondary btn-sm" onclick="history.back()">← Go Back</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection 