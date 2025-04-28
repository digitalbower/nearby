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
    <label class="form-label">Category Icon</label>
    <select class="form-control" name="categoryicon" required>
        <option value="fas fa-heart h-5 w-5">Beauty</option>
        <option value="fas fa-calendar-alt h-5 w-5">Events</option>
        <option value="fas fa-tshirt h-5 w-5">Fashion</option>
        <option value="fas fa-dumbbell h-5 w-5">Fitness</option>
        <option value="fas fa-utensils h-5 w-5">Food & Drink</option>
        <option value="fas fa-couch h-5 w-5">Furniture</option>
        <option value="fas fa-home h-5 w-5">Home & Garden</option>
        <option value="fas fa-shopping-bag h-5 w-5">Shopping</option>
        <option value="fas fa-plane h-5 w-5">Travel</option>
    </select>
</div>



        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1">
            <label class="form-check-label">Active</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="enable_homecarousel" value="1">
            <label class="form-check-label">Show in Home Carousel</label>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
