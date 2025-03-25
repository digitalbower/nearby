@extends('admin.layouts.masteradmin')

@section('title', 'Add Unit Type')

@section('content')
<div class="container mt-5">
    <h2>Add Unit Type</h2>

    <form action="{{ route('admin.unit_types.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Unit Type</label>
            <input type="text" class="form-control" name="unit_type" required>
        </div>

        <div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
        <option value="1" selected>Active</option>
        <option value="0">Inactive</option>
    </select>
</div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
