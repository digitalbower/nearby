@extends('admin.layouts.masteradmin')

@section('title', 'Edit Subcategory')

@section('content')

<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-md bg-white rounded-3">
        <h2 class="mb-3">Edit Subcategory</h2> 
        <form action="{{ route('admin.subcategories.update', $subcategory->id) }}" method="POST">
            @csrf
        

            <div class="mb-3">
                <label class="form-label">Subcategory Name</label>
                <input type="text" class="form-control" name="name" value="{{ $subcategory->name }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-control" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="status" value="1" {{ $subcategory->status ? 'checked' : '' }}>
                <label class="form-check-label">Active Status</label>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</div>

@endsection
