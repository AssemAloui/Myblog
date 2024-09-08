@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="container">
            <h1>posts list</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">title</th>
                        <th scope="col">body</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->body }}</td>
                            <td class="">
                                <button type="button" class="btn btn-warning my-1">
                                    {{-- @if (Auth::check()) --}}
                                    <a class="navbar-brand" href="{{ route('posts.edit', $post->id) }}">edit</a>
                                    {{-- @endif --}}
                                </button>
                                <button type="button" class="btn btn-danger my-1">
                                    <a class="navbar-brand" href="{{ route('posts.delete', $post->id) }}">delete</a>
                                </button>

                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{-- @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif --}}
        </div>
    </div>
@endsection
