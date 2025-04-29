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
        <select class="form-control" name="categoryicon" required>
            <option value="fas fa-heart h-5 w-5" {{ $category->categoryicon == 'fas fa-heart h-5 w-5' ? 'selected' : '' }}>Beauty</option>
            <option value="fas fa-calendar-alt h-5 w-5" {{ $category->categoryicon == 'fas fa-calendar-alt h-5 w-5' ? 'selected' : '' }}>Events</option>
            <option value="fas fa-tshirt h-5 w-5" {{ $category->categoryicon == 'fas fa-tshirt h-5 w-5' ? 'selected' : '' }}>Fashion</option>
            <option value="fas fa-dumbbell h-5 w-5" {{ $category->categoryicon == 'fas fa-dumbbell h-5 w-5' ? 'selected' : '' }}>Fitness</option>
            <option value="fas fa-utensils h-5 w-5" {{ $category->categoryicon == 'fas fa-utensils h-5 w-5' ? 'selected' : '' }}>Food & Drink</option>
            <option value="fas fa-couch h-5 w-5" {{ $category->categoryicon == 'fas fa-couch h-5 w-5' ? 'selected' : '' }}>Furniture</option>
            <option value="fas fa-home h-5 w-5" {{ $category->categoryicon == 'fas fa-home h-5 w-5' ? 'selected' : '' }}>Home & Garden</option>
            <option value="fas fa-shopping-bag h-5 w-5" {{ $category->categoryicon == 'fas fa-shopping-bag h-5 w-5' ? 'selected' : '' }}>Shopping</option>
            <option value="fas fa-plane h-5 w-5" {{ $category->categoryicon == 'fas fa-plane h-5 w-5' ? 'selected' : '' }}>Travel</option>
        </select>
    </div>

    <div class="mb-3">
            <label class="form-label">Markup (%)</label>
            <input type="text" class="form-control" name="markup" value="{{ $category->markup }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Commission (%)</label>
            <input type="text" class="form-control" name="commission" value="{{ $category->commission }}" required>
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
