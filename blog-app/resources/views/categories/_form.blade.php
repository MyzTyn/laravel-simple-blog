<div class="container flex-grow-1 justify-content-center align-items-center d-flex">
    <div class="card shadow-sm col-md-6">
        <div class="card-body">
            <h2 class="card-title mb-4 text-center">{{ $header_title }}</h2>
            <form action="{{ $action }}" method="POST">
                @csrf
                @if ($method === 'PUT')
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name', $category->name ?? '') }}" required autocomplete="off">
                </div>
                <div class="d-grid">
                    <button type="submit"
                        class="btn btn-{{ $method === 'PUT' ? 'success' : 'primary' }}">{{ $method === 'PUT' ? 'Update Category' : 'Create Category' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
