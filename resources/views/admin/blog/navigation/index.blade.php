@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none bg-transparent px-4 mt-5">
    <div class="card-body shadow-lg bg-white">
<div class="container mt-5">
    <h2>Navigation List</h2>

   

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                
                <th>Main Title</th>
                <th>Logo</th>
                <th>Main Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($navigation as $nav)
            <tr>
                
                <td>{{ $nav->main_title }}</td>
                <td>
                    @if($nav->logo)
                        <img src="{{ asset('storage/' . $nav->logo) }}" height="40">
                    @else
                        <span class="text-muted">No Logo</span>
                    @endif
                </td>
                <td>
                    @if($nav->main_image)
                        <img src="{{ asset('storage/' . $nav->main_image) }}" height="40">
                    @else
                        <span class="text-muted">No Image</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.blog.blognavigation.edit', $nav->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.blog.blognavigation.destroy', $nav->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this item?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">No navigation items found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>
</div>
@endsection
