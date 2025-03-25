@extends('admin.layouts.masteradmin')
@section('title', 'Edit Subcategory')
@section('content')

<div class="container mt-5">
    <h2>Edit Subcategory</h2>
    <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Subcategory Name -->
        <div class="mb-3">
            <label class="form-label">Subcategory Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $subcategory->name) }}" required>
        </div>

        <!-- Category Selection -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Filter Link -->
        <div class="mb-3">
            <label class="form-label">Filter Deep Link</label>
            <input type="text" class="form-control" name="filter_link" 
                   value="{{ old('filter_link', $subcategory->filter_link) }}">
        </div>

        <!-- Code -->
        <div class="mb-3">
            <label class="form-label">Code</label>
            <input type="text" class="form-control" name="code" value="{{ old('code', $subcategory->code) }}" required>
        </div>

        <!-- Status Toggle -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="status" value="1" 
                   {{ $subcategory->status ? 'checked' : '' }}>
            <label class="form-check-label">Active</label>
        </div>

        <!-- Show on Home Page Toggle -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="show_on_home" value="1" 
                   {{ $subcategory->show_on_home ? 'checked' : '' }}>
            <label class="form-check-label">Show on Home Page</label>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
