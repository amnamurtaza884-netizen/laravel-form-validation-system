@extends('layouts.app')

@section('content')
<h2 class="mb-4">Dashboard</h2>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary p-3">
            <h5>Total Posts</h5>
            <h3>{{ $posts->count() }}</h3>
        </div>
    </div>
</div>

<a href="{{ route('posts.create') }}" class="btn btn-success mb-3">+ Create Post</a>

@if($posts->isEmpty())
    <p>No posts available.</p>
@else
    @foreach ($posts as $post)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    @endforeach
@endif
@endsection