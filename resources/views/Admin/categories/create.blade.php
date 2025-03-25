@extends('admin.layouts.masteradmin')

@section('title', 'Add Category')
@section('content')

<div class="container mt-5">
    <h2>Add Category</h2>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Filter Deep Link</label>
            <input type="url" class="form-control" name="filter_link">
        </div>

        <div class="mb-3">
            <label class="form-label">Code</label>
            <input type="text" class="form-control" name="code" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1" checked>
            <label class="form-check-label">Active Status</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="show_on_home" value="1">
            <label class="form-check-label">Show on Home Page</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection

