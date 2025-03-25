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
            <label class="form-label">Filter Deep Link</label>
            <input type="url" class="form-control" name="filter_link" value="{{ $category->filter_link }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Code</label>
            <input type="text" class="form-control" name="code" value="{{ $category->code }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1" {{ $category->status ? 'checked' : '' }}>
            <label class="form-check-label">Active Status</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="show_on_home" value="1" {{ $category->show_on_home ? 'checked' : '' }}>
            <label class="form-check-label">Show on Home Page</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
