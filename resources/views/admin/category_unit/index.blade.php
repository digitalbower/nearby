@extends('admin.layouts.masteradmin')

@section('title', 'Category Unit Masters')

@section('content')
<div class="card shadow-none px-4 bg-transparent mt-5">
    <div class="card-body shadow-md bg-white rounded-3">
        <div class="d-flex mb-3 align-items-center justify-content-between">
            <h2>Category Unit Masters</h2>
            @if(auth()->guard('admin')->user()->hasPermission('create_category_unit'))
            <a href="{{ route('admin.category_unit.create') }}" class="btn btn-primary mb-3">Add New</a>
            @endif
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Unit Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categoryUnits as $unit)
                    <tr>
                        <td>{{ $unit->id }}</td>
                        <td>{{ $unit->category->name }}</td>
                        <td>{{ $unit->unitType->unit_type }}</td>
                        <td>{{ $unit->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if(auth()->guard('admin')->user()->hasPermission('edit_category_unit'))
                            <a href="{{ route('admin.category_unit.edit', $unit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermission('delete_category_unit'))
                            <form action="{{ route('admin.category_unit.destroy', $unit->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
