@extends('admin.layouts.masteradmin')

@section('title', 'Add Category Unit Master')

@section('content')
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-md bg-white rounded-3">
        <h2 class="mb-3">Add Category Unit Master</h2>
        <form action="{{ route('admin.category_unit.store') }}" method="POST">
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
                <select class="form-control" name="unit_type_id" required>
                    @foreach($unitTypes as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->unit_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
