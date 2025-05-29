@extends('admin.layouts.masteradmin')
@section('title', 'Products')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/custom/customcss.css') }}?v={{ time() }}">
@endsection
@section('content')
    <div class="card shadow-none px-4 bg-transparent mt-5">
        <div class="card-body shadow-lg bg-white rounded-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div id="status-message"></div>
            <div class="d-flex align-items-center justify-content-between mb-3">
                <h3 class="text-start">Products</h3>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add New Product</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Vendor</th>
                        <th>Category</th>
                        <th>Sub Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $index=>$product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                {{ optional($product->vendor)->name ?? '' }}
                            </td>
                            <td>
                                {{ optional($product->category)->name ?? '' }}
                            </td>
                            <td>
                                {{ optional($product->subcategory)->name ?? '' }}
                            </td>
                            <td class="d-flex align-items-center gap-2">
                                <!-- Toggle Switch -->
                                <div class="form-check form-switch">
                                    <input class="form-check-input toggle-status" type="checkbox" 
                                           data-id="{{ $product->id }}" 
                                           {{ $product->status ? 'checked' : '' }}>
                                </div>
                            
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No Products available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product.js') }}"></script>
@endpush