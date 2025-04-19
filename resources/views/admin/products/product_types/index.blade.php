@extends('admin.layouts.masteradmin')
@section('title', 'Product Types')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Product Types</h4>
            

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.products.product_types.create') }}" class="btn btn-primary">Add Product Type</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Type</th>
                        <th>validity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($types as $index => $type)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $type->product_type }}</td>
                            <td>{{ $type->validity }}</td>
                            <td class="d-flex align-items-center gap-2">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" 
                                           data-id="{{ $type->id }}" 
                                           {{ $type->status ? 'checked' : '' }}>
                                </div>
                            
                                <!-- Edit Button -->
                                <a href="{{ route('admin.products.product_types.edit', $type->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.product_types.destroy', $type->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this product type?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>                            
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No Product Types available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_type.js') }}"></script>
@endpush