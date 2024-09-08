@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">


                        {{ __('You are logged in!') }}
                    </div>
                </div>
                {{-- post input --}}
                <form action="{{ route('posts.store') }}" class="border border-primary p-2 my-3" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">post title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                            placeholder="title">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">post content</label>
                        <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button class="btn btn-primary" type="submit">save</button>
                </form>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
