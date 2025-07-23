{{-- Partical Form for Create & Edit --}}
<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="fw-bolder mb-4 text-center">{{ $header_title }}</h1>

                    <form action="{{ $action }}" method="POST">
                        @csrf
                        @if ($method === 'PUT')
                            @method('PUT')
                        @endif
                        {{-- Title --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ old('title', $post->title ?? '') }}" required>
                        </div>
                        {{-- Author --}}
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author"
                                value="{{ old('author', $post->author ?? '') }}" required>
                        </div>
                        {{-- Categories --}}
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories</label>
                            <select class="form-select" id="categories" name="categories[]" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ isset($post) && in_array($category->id, old('categories', $post->categories->pluck('id')->toArray() ?? [])) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="form-text">Hold Ctrl (Windows) or Command (Mac) to select multiple.</div>
                        </div>
                        {{-- Content --}}
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $post->content ?? '') }}</textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-{{ $method === 'PUT' ? 'success' : 'primary' }}">
                                {{ $method === 'PUT' ? 'Update Post' : 'Create Post' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
