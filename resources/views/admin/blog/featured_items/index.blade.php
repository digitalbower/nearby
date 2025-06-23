@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container mt-5">
    <h2>Featured Items</h2>
    <a href="{{ route('admin.blog.featured-items.create') }}" class="btn btn-primary mb-3">Add Featured Item</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Link</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->link }}</td>
                <td>
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" height="50">
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.blog.featured-items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blog.featured-items.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this item?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
