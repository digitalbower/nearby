@extends('admin.layouts.masteradmin')
@section('title', 'Hero Carousel Management')

@section('content')
<div class="container">
    <h4>Hero Carousel Management</h4>
    <a href="{{ route('admin.hero-carousel.create') }}" class="btn btn-primary mb-3">Add New Carousel</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carousels as $carousel)
                <tr>
                    <td>{{ $carousel->product->name }}</td>
                    <td>{{ $carousel->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.hero-carousel.edit', $carousel->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.hero-carousel.destroy', $carousel->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
