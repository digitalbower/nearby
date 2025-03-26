@extends('admin.layouts.masteradmin')

@section('title', 'Edit Category Unit Master')

@section('content')
<div class="container mt-5">
    <h2>Edit Category Unit Master</h2>

    <form action="{{ route('admin.category_unit.update', $categoryUnitMaster->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Category Selection -->
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $categoryUnitMaster->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Unit Type Selection -->
        <div class="mb-3">
            <label class="form-label">Unit Type</label>
            <select class="form-control" name="unit_type_id" required>
                @foreach($unitTypes as $unitType)
                    <option value="{{ $unitType->id }}" {{ $categoryUnitMaster->unit_type_id == $unitType->id ? 'selected' : '' }}>
                        {{ $unitType->unit_type }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Status Field -->
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $categoryUnitMaster->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $categoryUnitMaster->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.category_unit.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
