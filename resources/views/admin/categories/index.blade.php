@extends('admin.layouts.masteradmin')

@section('title', 'Categories')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
        <div class="d-flex mb-3 align-items-center justify-content-between">
            <h2>Categories</h2>
            @if(auth()->guard('admin')->user()->hasPermission('create_category'))
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Add Category</a>
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
                        <th>Name</th>
                        <th>Code</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Enable Home Carousel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->code }}</td>
                            <td> <i class="{{ $category->categoryicon }}"></i></td>
                            <td>{{ $category->status ? 'Active' : 'Inactive' }}</td>
                            <td>{{ $category->enable_homecarousel ? 'Yes' : 'No' }}</td>
                            <td>
                                @if(auth()->guard('admin')->user()->hasPermission('edit_category'))
                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('delete_category'))
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $categories->links() }}
    </div>
</div>
@endsection
