@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    @include('categories._form', [
        'header_title' => 'Edit Category',
        'action' => route('categories.update', $category),
        'method' => 'PUT',
        'category' => $category,
    ])
@endsection
