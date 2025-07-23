@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Categories</h1>
            </div>
        </div>
    </header>
    <div class="container d-flex flex-column flex-grow-1">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3 mr-auto">Create New Category</a>

        @if ($categories->isEmpty())
            <div class="alert alert-info">No categories available.</div>
        @else
            <ul class="list-group mb-3">
                @foreach ($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span>{{ $category->name }}</span>
                        <span>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="d-flex justify-content-center mt-auto">
                {{ $categories->links() }}
            </div>
        @endif
    </div>
@endsection
