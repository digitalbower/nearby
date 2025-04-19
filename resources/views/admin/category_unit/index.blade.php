@extends('admin.layouts.masteradmin')

@section('title', 'Category Unit Masters')

@section('content')
<div class="container mt-5">
    <h2>Category Unit Masters</h2>
    <a href="{{ route('admin.category_unit.create') }}" class="btn btn-primary mb-3">Add New</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                    <a href="{{ route('admin.category_unit.edit', $unit->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.category_unit.destroy', $unit->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
