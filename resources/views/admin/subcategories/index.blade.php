@extends('admin.layouts.masteradmin')

@section('title', 'Subcategories')

@section('content')
<div class="card shadow-none px-4 bg-transparent mt-4">
    <div class="card-body shadow-md bg-white rounded-3">
        <div class="d-flex align-items-center justify-content-between">
            <h2>Subcategories</h2>
            @if(auth()->guard('admin')->user()->hasPermission('create_subcategory'))
            <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-plus"></i> Add Subcategory
            </a>
            @endif
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subcategories as $subcategory)
                    <tr>
                        <td>{{ $subcategory->id }}</td>
                        <td>{{ $subcategory->category->name }}</td>
                        <td>{{ $subcategory->name }}</td>
                        <td>{{ $subcategory->code }}</td>
                        <td>{{ $subcategory->status ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @if(auth()->guard('admin')->user()->hasPermission('edit_subcategory'))
                            <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            @endif
                            @if(auth()->guard('admin')->user()->hasPermission('delete_subcategory'))
                            <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $subcategories->links() }}
        </div>
</div>
@endsection
