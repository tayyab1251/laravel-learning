@extends('layouts.app')

@section('title', 'Post')

@section('content')
<div class="card border border-danger">
  <div class="card-body">
    <h1 class="card-title">{{$post->title}}</h1>
    <p class="card-text">{{$post->description}}</p>
    <p class="card-text"> @if ($post->status == 1)
      <small class="badge rounded-pill text-bg-success">Published</small>
      @else
      <small class="badge rounded-pill text-bg-danger">Draft</small>
      @endif
    </p>
    <p class="card-text"><span class="fw-bold">Created Date : </span>{{$post->created_at->format('d-M-Y')}}</p>

    <button href="#" class="btn btn-primary" onclick="history.back()">Go Back</button>
  </div>
</div>
@endsection