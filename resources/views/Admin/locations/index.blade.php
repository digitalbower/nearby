@extends('admin.layouts.masteradmin')
@section('title', 'Logo Preview')
@section('content')

<div class="wrapper-div">
<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Location Scope Management </h2>
    <a href="{{ route('admin.locations.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus"></i> Add Location
    </a>
</div>
<hr>

        
 
<table class="table">
        <tr>
            <th>#</th>
            <th>Emirate Name</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        @foreach ($locations as $location)
            <tr>
                <td>{{ $location->id }}</td>
                <td>{{ $location->emirate_name }}</td>
                <td>{{ $location->active ? 'Yes' : 'No' }}</td>
                <td>
                    <a href="{{ route('admin.locations.edit', $location->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
