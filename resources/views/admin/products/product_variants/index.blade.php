@extends('admin.layouts.masteradmin')
@section('title', 'Product Variants')
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
                <h3 class="text-start mb-0">Product Variants</h3>
                @if(auth()->guard('admin')->user()->hasPermission('create_productvariants'))
                <a href="{{ route('admin.products.product_variants.create') }}" class="btn btn-primary">Add New Product Variant</a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Title</th>
                            <th>Market Unit Price</th>
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
                                <td class="d-flex align-items-center gap-2">
                                    <!-- Toggle Switch -->
                                    @if(auth()->guard('admin')->user()->hasPermission('changestatus_productvariants'))
                                    <div class="form-check form-switch">
                                        <input class="form-check-input toggle-status" type="checkbox" 
                                            data-id="{{ $variant->id }}" 
                                            {{ $variant->status ? 'checked' : '' }}>
                                    </div>
                                    @endif
                                    @if(auth()->guard('admin')->user()->hasPermission('edit_productvariants'))
                                    <a href="{{ route('admin.products.product_variants.edit', $variant->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @endif
                                    @if(auth()->guard('admin')->user()->hasPermission('delete_productvariants'))
                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.products.product_variants.destroy', $variant->id) }}" method="POST" class="d-inline" 
                                        onsubmit="return confirm('Are you sure you want to delete this variant?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    @endif
                                    @if($variant->product->types->product_type === "Fixed Date")
                                        @if(auth()->guard('admin')->user()->hasPermission('edit_blackoutdates'))
                                        <a href="{{ route('admin.products.product_variants.blackout_dates.edit', $variant->id) }}" class="btn btn-warning btn-sm">Blackout dates</a>
                                        @endif
                                    @endif
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
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_variant.js') }}"></script>
@endpush