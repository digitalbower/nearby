@extends('admin.layouts.masteradmin')

@section('title', 'Categories')
@section('content')

<div class="container mt-5">
    <h2>Categories</h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Show on Home</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->code }}</td>
                <td>{{ $category->show_on_home ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this category?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
