@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    @include('posts._form', [
        'header_title' => 'Create New Post',
        'action' => route('posts.store'),
        'method' => 'POST',
        'categories' => $categories,
        'post' => null,
    ])
@endsection
