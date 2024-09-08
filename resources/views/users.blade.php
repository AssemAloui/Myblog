@extends('layouts.app')

@section('content')
    <div class="text-center">
        <div class="container">
            <h1>users list</h1>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered border-primary mt-3">
                <thead>
                    <tr>
                        <th scope="col">#</th>

                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="">
                                <button type="button" class="btn btn-danger my-1">
                                    <a class="navbar-brand" href="{{ route('users.delete', $user->id) }}">delete</a>
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
