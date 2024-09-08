@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="">
            <h1>Welcome to My Blog App</h1>
            <button class="btn">
                <a href="{{ route('home') }}">go to the your account</a>
            </button>
        </div>
    </div>
    <div class="container d-flex flex-column align-items-center ">
        @foreach ($posts as $post)
            <div class="card my-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->name }} | {{ $post->created_at }}</h6>
                    <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                    <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read</a>
                </div>
            </div>
        @endforeach
        <!-- Pagination links -->
        <div class="text-center d-flex justify-content-between">
            {{ $posts->links('pagination::bootstrap-5') }}

        </div>
    </div>
@endsection
