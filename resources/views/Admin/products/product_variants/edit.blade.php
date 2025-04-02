@extends('admin.layouts.masteradmin')
@section('title', 'Product variants')
@section('content')
  
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h4 class="text-center mb-4">Edit Product Variant</h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('admin.products.product_variants.update', $product_variant->id) }}"  id="variantForm" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="product_id" class="form-label">Products</label>
                    <select class="form-control" name="product_id" id="product_id">
                        <option value="">Select Products</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}"  data-category="{{ $product->category_id }}" 
                                {{ old('product_id', $product_variant->product_id ?? '') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$product_variant->title }}">
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Short Description</label>
                    <textarea class="form-control" id="short_description" name="short_description">{{$product_variant->short_description}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price" value="{{$product_variant->unit_price }}">
                </div>
                <div class="mb-3">
                    <label for="unit_type_id" class="form-label">Unit Type</label>
                    <input type="hidden" id="unit_type" name="unit_type" value="{{$product_variant->unit_type_id}}">
                    <select class="form-control" name="unit_type_id" id="unit_type_id">
                        <option value="">Select Unit Types</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="discounted_price" class="form-label">Discounted Price</label>
                    <input type="text" class="form-control" id="discounted_price" name="discounted_price" value="{{$product_variant->discounted_price }}">
                </div>
                <div class="mb-3">
                    <label for="available_quantity" class="form-label">Available Quantity</label>
                    <input type="integer" class="form-control" id="available_quantity" name="available_quantity" value="{{$product_variant->available_quantity }}">
                </div>
                <div class="mb-3">
                    <label for="threshold_quantity" class="form-label">Threshold Quantity</label>
                    <input type="integer" class="form-control" id="threshold_quantity" name="threshold_quantity" value="{{$product_variant->threshold_quantity }}">
                </div>
                <div class="mb-3">
                    <label for="validity_from" class="form-label">Validity From</label>
                    <input type="date" class="form-control" id="validity_from" name="validity_from" value="{{$product_variant->validity_from }}">
                </div>
                <div class="mb-3">
                    <label for="validity_to" class="form-label">Validity To</label>
                    <input type="date" class="form-control" id="validity_to" name="validity_to" value="{{$product_variant->validity_to }}">
                </div>
                <div class="mb-3">
                    <label for="timer_flag" class="form-label">Timer</label>
                    <select class="form-control" name="timer_flag" id="timer_flag">
                        <option value="0" {{ old('timer_flag', $product_variant->timer_flag) == 0 ? 'selected' : '' }}>No</option>
                        <option value="1" {{ old('timer_flag', $product_variant->timer_flag) == 1 ? 'selected' : '' }}>Yes</option>
                    </select>
                </div>
                
                <div id="timer" style="display: none;">                    
                    <div class="mb-3">
                        <label for="start_time" class="form-label">Select Start Time</label> 
                        <input type="datetime-local" class="form-control" id="start_time" name="start_time" 
                            value="{{ old('start_time', $product_variant->start_time ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label for="end_time" class="form-label">Select End Time</label> 
                        <input type="datetime-local" class="form-control" id="end_time" name="end_time" 
                            value="{{ old('end_time', $product_variant->end_time ?? '') }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('admin.products.product_variants.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/js/custom/js/product_variant.js') }}"></script>
@endpush


