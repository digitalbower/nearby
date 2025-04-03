@extends('admin.layouts.masteradmin')

@section('title', 'Edit Category')

@section('content')
<div class="container mt-5">
    <h2>Edit Category</h2>
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Category Icon</label>
            <input type="text" class="form-control" name="categoryicon" value="{{ $category->categoryicon }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1" {{ $category->status ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="enable_homecarousel" value="1" {{ $category->enable_homecarousel ? 'checked' : '' }}>
            <label class="form-check-label">Show in Home Carousel</label>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
