@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center">Edit Category</h4>
        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
            </div>

            @if($category->code)
            <div class="mb-3">
                <label class="form-label">Code (Auto-Generated)</label>
                <input type="text" class="form-control" name="code" value="{{ $category->code }}" readonly>
            </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Category Icon</label>
                <input type="text" class="form-control" name="categoryicon" value="{{ $category->categoryicon }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="1" {{ $category->status ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ !$category->status ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Enable Home Carousel</label>
                <select class="form-control" name="enable_homecarousel">
                    <option value="1" {{ $category->enable_homecarousel ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$category->enable_homecarousel ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
