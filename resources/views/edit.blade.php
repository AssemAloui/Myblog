@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Post Content</label>
                <textarea class="form-control" id="body" name="body" rows="3" required>{{ old('body', $post->body) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>


    </div>
@endsection
