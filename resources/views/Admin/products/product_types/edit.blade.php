@extends('admin.layouts.masteradmin')
@section('title', ' Product Types')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Product Type</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.product_types.update', $product_type->id) }}"  id="productTypeForm" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="product_type" class="form-label">Product Type</label>
                    <input type="text" class="form-control" id="product_type" name="product_type" value="{{ $product_type->product_type }}">
                </div>
                <div class="mb-3">
                    <label for="validity" class="form-label">Validity</label>
                    <input type="text" class="form-control" id="validity" name="validity" value="{{ $product_type->validity }}">
                </div>

                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.vendors.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_type.js') }}"></script>
@endpush

