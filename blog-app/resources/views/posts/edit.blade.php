@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    {{-- Form for editing a post --}}
    @include('posts._form', [
        'header_title' => 'Edit Post',
        'action' => route('posts.update', $post->id),
        'method' => 'PUT',
        'categories' => $categories,
        'post' => $post,
    ])
@endsection
