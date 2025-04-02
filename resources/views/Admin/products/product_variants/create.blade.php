@extends('admin.layouts.masteradmin')
@section('title', 'Product variants')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Add Product Variant</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.product_variants.store') }}" id="variantForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product_id" class="form-label">Products</label>
                    <select class="form-control" name="product_id" id="product_id">
                        <option value="">Select Products</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" 
                                data-category="{{ $product->category_id }}"
                                {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description">{{old('short_description')}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{old('unit_price') }}">
                </div>
                <div class="mb-3">
                    <label for="unit_type_id" class="form-label">Unit Type</label>
                    <select class="form-control" name="unit_type_id" id="unit_type_id">
                        <option value="">Select Unit Types</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="discounted_price" class="form-label">Discounted Price</label>
                    <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{old('discounted_price') }}">
                </div>
                <div class="mb-3">
                    <label for="available_quantity" class="form-label">Available Quantity</label>
                    <input type="number" class="form-control" id="available_quantity" name="available_quantity" value="{{old('available_quantity') }}">
                </div>
                <div class="mb-3">
                    <label for="threshold_quantity" class="form-label">Threshold Quantity</label>
                    <input type="number" class="form-control" id="threshold_quantity" name="threshold_quantity" value="{{old('threshold_quantity') }}">
                </div>
                <div class="mb-3">
                    <label for="validity_from" class="form-label">Validity From</label>
                    <input type="date" class="form-control" id="validity_from" name="validity_from" value="{{old('validity_from') }}">
                </div>
                <div class="mb-3">
                    <label for="validity_to" class="form-label">Validity To</label>
                    <input type="date" class="form-control" id="validity_to" name="validity_to" value="{{old('validity_to') }}">
                </div>
                <div class="mb-3">
                    <label for="timer_flag" class="form-label">Timer</label>
                    <select class="form-control" name="timer_flag" id="timer_flag">
                        <option value="0" {{ old('timer_flag') == '0' ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('timer_flag') == '1' ? 'selected' : '' }}>Yes</option>
                   </select>
                </div>
                
                <div id="timer" class="hidden">
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Select Start Time</label> 
                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" value="{{ old('start_time') }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Select End Time</label> 
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <a href="{{ route('admin.products.product_variants.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_variant.js') }}"></script>
@endpush


