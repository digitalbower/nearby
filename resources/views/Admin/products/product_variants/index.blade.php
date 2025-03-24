@extends('admin.layouts.masteradmin')
@section('title', 'Product Variants')
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Product Variants</h4>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-message">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('admin.products.product_variants.create') }}" class="btn btn-primary">Add New Product Variant</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Title</th>
                        <th>Unit Price</th>
                        <th>Validity From</th>
                        <th>Validity To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($variants as $index=>$variant)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{$variant->product->name}}</td>
                            <td>{{ $variant->title }}</td>
                            <td>{{ $variant->unit_price }}</td>
                            <td>{{ $variant->validity_from }}</td>
                            <td>{{ $variant->validity_to }}</td>
                            <td>
                                <a href="{{ route('admin.products.product_variants.edit', $variant->id) }}" class="btn btn-warning">Edit</a>
                            
                                <!-- Delete Form -->
                                <form action="{{ route('admin.products.product_variants.destroy', $variant->id) }}" method="POST" class="d-inline" 
                                      onsubmit="return confirm('Are you sure you want to delete this variant?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No Product Variants available.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection