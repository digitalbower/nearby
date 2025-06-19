@extends('admin.layouts.masteradmin')

@section('title', 'Logo Management')

@section('content')

<div class="admin-logo mt-5">
    <div class="card px-4 mb-0 bg-transparent shadow-none">
        <div class="card-body bg-white shadow">
            <h4 class="">Logo Management</h4>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Logo</th>
                            <th>Link</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($logos as $logo)
                        <tr>
                            <td>{{ $logo->id }}</td>
                            <td><img src="{{ asset('storage/'.$logo->image) }}" width="80"></td>
                            <td>{{ $logo->link }}</td>
                            <td>{{ $logo->type }}</td>
                            <td>{{ $logo->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @if(auth()->guard('admin')->user()->hasPermission('edit_logos'))
                                <a href="{{ route('admin.logos.edit', $logo->id) }}" class="btn btn-warning">Edit</a>
                                @endif
                                @if(auth()->guard('admin')->user()->hasPermission('delete_logos'))
                                <form action="{{ route('admin.logos.destroy', $logo->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
