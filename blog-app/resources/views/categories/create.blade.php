@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    @include('categories._form', [
        'header_title' => 'Create New Category',
        'action' => route('categories.store'),
        'method' => 'POST',
        'category' => null,
    ])
@endsection
