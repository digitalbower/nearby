@extends('admin.layouts.masteradmin')

@section('title', 'Edit Unit Type')

@section('content')
<div class="container mt-5">
    <h2>Edit Unit Type</h2>

    <form action="{{ route('admin.unit_types.update', $unitType->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $unitType->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Item</label>
            <input type="text" class="form-control" name="item" value="{{ $unitType->item }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
