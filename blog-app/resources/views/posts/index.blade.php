@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    {{-- Page header for posts --}}
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Posts</h1>
            </div>
        </div>
    </header>
    {{-- Simple Table for all posts (For CRUD Operations) --}}
    <div class="container-fluid">
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>

        @if ($posts->isEmpty())
            <div class="alert alert-info">No posts available.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->strip_content(), 100) }}</td>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
@endsection
