@extends('admin.layouts.masteradmin')

@section('content')
<div class="container">
    <h2>Blogs</h2>
    <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary mb-3">Add Blog</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead><tr><th>Title</th><th>Action</th></tr></thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>
                    <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
