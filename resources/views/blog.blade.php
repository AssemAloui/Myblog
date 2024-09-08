@extends('layouts.app')

@section('content')
    <div class="text-center container mt-5">
        <div class="row">
            <div class="col-8 border">
                <h1>{{ $singlepost->title }}</h1>
                <h4>{{ $singlepost->name }} | {{ $singlepost->created_at }}</h4>
                <p>{{ $singlepost->body }}</p>
            </div>
            <div class="col-4 border">
                @foreach ($posts as $post)
                    <div class="card my-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">{{ $post->name }} | {{ $post->created_at }}
                            </h6>
                            <p class="card-text">{{ Str::limit($post->body, 100) }}</p>
                            <a href="{{ route('blog.show', $post->id) }}" class="btn btn-primary">Read</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
