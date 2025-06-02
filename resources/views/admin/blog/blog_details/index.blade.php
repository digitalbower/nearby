@extends('admin.layouts.masteradmin')
@section('content')
<div class="container">
    <h2>Blog Details</h2>
    <a href="{{ route('admin.blog-details.create') }}" class="btn btn-primary mb-3">Add Detail</a>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table">
        <thead><tr><th>Title</th><th>Blog</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($details as $detail)
            <tr>
                <td>{{ $detail->title }}</td>
                <td>{{ $detail->blog->title ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('admin.blog-details.edit', $detail->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.blog-details.destroy', $detail->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
