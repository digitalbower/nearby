@extends('admin.layouts.masteradmin')
@section('title', 'Logo Preview')
@section('content')

<div class="wrapper-div">
<div class="container mt-5">

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Navigation Menu List </h2>
    <a href="{{ route('admin.navigation.create') }}" class="btn btn-primary btn-lg">
        <i class="fas fa-plus"></i> Add Menu Item
    </a>
</div>
<hr>

        
 
    <table class="table">
        <tr>
            <th>Label</th>
            <th>Link</th>
            <th>Placement</th>
            <th>Active</th>
            <th>Actions</th>
        </tr>
        @foreach ($menuItems as $item)
            <tr>
                <td>{{ $item->label }}</td>
                <td>{{ $item->link }}</td>
                <td>{{ ucfirst($item->navigation_placement) }}</td>
                <td>{{ $item->active ? 'Yes' : 'No' }}</td>
                <td>
                    
                        <a href="{{ route('admin.navigation.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.navigation.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                   
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
@endsection
