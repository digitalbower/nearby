@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center">Add Category</h4>
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" required>
            </div>

            
            <div class="mb-3">
                <label class="form-label">Category Icon</label>
                <input type="text" class="form-control" name="categoryicon" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-control" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Enable Home Carousel</label>
                <select class="form-control" name="enable_homecarousel">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
</div>
@endsection
