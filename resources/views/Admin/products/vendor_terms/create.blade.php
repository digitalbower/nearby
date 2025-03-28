@extends('admin.layouts.masteradmin')
@section('title', 'Vendor Terms')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Add Vendor Terms</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.vendor_terms.store') }}" id="vendorTermForm" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Products</label>
                    <select class="form-control" name="product_id" id="productSelect">
                        <option value="">Select Product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}  data-vendor-id="{{ optional($product->vendor)->id }}">
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vendor_id" class="form-label">Vendors</label>
                    <select class="form-control" id="vendorSelect" disabled>
                        <option value="">Vendors</option>
                        @foreach ($vendors as $vendor)
                            <option value="{{ $vendor->id }}">
                                {{ $vendor->name }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="vendor_id" id="vendorId">
                </div>
                <div class="mb-3">
                    <label for="terms" class="form-label">Terms</label>
                    <textarea class="form-control" id="terms" name="terms">{{old('terms')}}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.vendor_terms.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/vendor_terms.js') }}"></script>
@endpush


