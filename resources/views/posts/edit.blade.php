@extends('layouts.app')

@section('content')

<h2>Edit Post</h2>

<form action="{{ route('posts.update', $post->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Content</label>
        <textarea name="content" class="form-control">{{ $post->content }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection