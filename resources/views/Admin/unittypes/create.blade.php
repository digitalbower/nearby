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
            <label class="form-label">Item</label>
            <input type="text" class="form-control" name="item" required>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
