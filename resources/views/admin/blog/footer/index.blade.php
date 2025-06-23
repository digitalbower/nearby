@extends('admin.layouts.masteradmin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Footer Items</h2>
        <a href="{{ route('admin.blog.footer.create') }}" class="btn btn-success">Add New Footer</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Content</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($footers as $footer)
                <tr>
                    <td>{{ ucfirst($footer->type) }}</td>
                    <td>
                        @if ($footer->type === 'text')
                            {{ $footer->footer_text }}
                        @else
                            {{ ucfirst($footer->social_icon) }}
                        @endif
                    </td>
                    <td>
                        @if ($footer->type === 'text')
                            <a href="{{ $footer->footer_link }}" target="_blank">{{ $footer->footer_link }}</a>
                        @else
                            <a href="{{ $footer->social_link }}" target="_blank">{{ $footer->social_link }}</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.blog.footer.edit', $footer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.blog.footer.destroy', $footer->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this footer item?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="text-center">No footer items found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
