@extends('admin.layouts.masteradmin')

@section('title', 'Subcategories')
@section('content')

<div class="container mt-5">
    <h2>Subcategories</h2>
    <a href="{{ route('admin.subcategories.create') }}" class="btn btn-primary mb-3">Add Subcategory</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Filter Link</th>
                <th>Code</th>
                <th>Status</th>
                <th>Show on Home</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{ $subcategory->name }}</td>
                <td>{{ $subcategory->category->name }}</td>
                <td>{{ $subcategory->filter_link }}</td>
                <td>{{ $subcategory->code }}</td>
                <td>{{ $subcategory->status ? 'Active' : 'Inactive' }}</td>
                <td>{{ $subcategory->show_on_home ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.subcategories.edit', $subcategory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.subcategories.destroy', $subcategory->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
