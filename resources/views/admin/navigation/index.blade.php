@extends('admin.layouts.masteradmin')

@section('title', 'Navigation Menu List')

@section('content')
<div class="wrapper-div pt-0">
    <div class="card px-4 shadow-none bg-transparent mt-5">
        <div class="card-body bg-white">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Navigation Menu List</h2>
                <a href="{{ route('admin.navigation.create') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-plus"></i> Add Menu Item
                </a>
            </div>
            

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Link</th>
                        <th>Type</th>
                        <th>Icon</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menuItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ $item->link }}" target="_blank">{{ $item->link }}</a></td>
                            <td>{{ ucfirst($item->navigation_placement) }}</td>
                            <td>
                                @if($item->icon)
                                    <i class="{{ $item->icon }}"></i>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $item->status ? 'badge-success' : 'badge-danger' }}">
                                    {{ $item->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.navigation.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.navigation.destroy', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">
                                        Delete
                                    </button>
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
