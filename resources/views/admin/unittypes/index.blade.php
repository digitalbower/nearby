@extends('admin.layouts.masteradmin')

@section('title', 'Unit Types')
@section('content')

<div class="container mt-5">
    <h2>Unit Types</h2>
    <a href="{{ route('admin.unit_types.create') }}" class="btn btn-success mb-3">Add Unit Type</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Unit Type</th>
                <th>Status</th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unitTypes as $unitType)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $unitType->unit_type }}</td>
                    <td>{{ $unitType->status ? 'Active' : 'Inactive' }}</td>
                  
                    <td>
                        <a href="{{ route('admin.unit_types.edit', $unitType->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.unit_types.destroy', $unitType->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
