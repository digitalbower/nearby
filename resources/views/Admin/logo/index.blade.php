@extends('admin.layouts.masteradmin')

@section('title', 'Logo Management')

@section('content')

<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center">Logo Management</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        

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
                    <td><img src="{{ asset('storage/'.$logo->logo) }}" width="80"></td>
                    <td>{{ $logo->link }}</td>
                    <td>{{ $logo->type }}</td>
                    <td>{{ $logo->status ? 'Active' : 'Inactive' }}</td>
                    <td>
                        <a href="{{ route('admin.logos.edit', $logo->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.logos.destroy', $logo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
