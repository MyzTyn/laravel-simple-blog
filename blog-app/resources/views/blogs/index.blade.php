@extends('layouts.app')

@section('title', $title)

@section('content')
    @if (request()->is('/'))
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
    @elseif(isset($category))
        <!-- Category header -->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">{{ $category->name }}</h1>
                    <p class="lead mb-0">Posts in category: {{ $category->name }}</p>
                </div>
            </div>
        </header>
    @endif
    <div class="container">
        {{-- TODO: Add error page if the posts are empty --}}
        <div class="row">
            <!-- Blog entries-->
            <div class="col-lg-8">
                <!-- Featured blog post-->
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"
                            alt="..." /></a>
                    <div class="card-body">
                        <div class="small text-muted">{{ $posts->first()->created_at->format('F j, Y') }}</div>
                        <h2 class="card-title">{{ $posts->first()->title }}</h2>
                        <p class="card-text">
                            {{ Str::limit($posts->first()->strip_content(), 100) }}</p>
                        <a class="btn btn-primary" href="{{ route('posts.show', $posts->first()) }}">Read more →</a>
                    </div>
                </div>
                <!-- Nested row for non-featured blog posts-->
                <div class="row">
                    @foreach ($posts->slice(1) as $post)
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="#!"><img class="card-img-top"
                                        src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted">{{ $post->created_at->format('F j, Y') }}</div>
                                    <h2 class="card-title h4">{{ $post->title }}</h2>
                                    <p class="card-text">
                                        {{ Str::limit($post->strip_content(), 100) }}
                                    </p>
                                    <a class="btn btn-primary" href="{{ route('posts.show', $post) }}">Read more →</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination-->
                {{ $posts->links('vendor.pagination.simple') }}
            </div>

            <!-- Side widgets-->
            <div class="col-lg-4">
                <!-- Search widget-->
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..."
                                aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>

                <!-- Categories widget-->
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach (collect($categories)->chunk(ceil(count($categories) / 2)) as $chunk)
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($chunk as $category)
                                            <li><a
                                                    href="{{ route('category.show', $category) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Side widget-->
                <div class="card mb-4">
                    <div class="card-header">Side Widget</div>
                    <div class="card-body">You can put anything you want inside of these side widgets. They are easy to
                        use, and feature the Bootstrap 5 card component!</div>
                </div>
            </div>
        </div>
    </div>
@endsection
