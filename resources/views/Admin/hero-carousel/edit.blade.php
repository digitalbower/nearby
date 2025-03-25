@extends('admin.layouts.masteradmin')
@section('title', 'Edit Hero Carousel')

@section('content')
<div class="container">
    <h4>Edit Hero Carousel</h4>
    <form action="{{ route('admin.hero-carousel.update', $carousel->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product</label>
            <select class="form-control" name="product_id" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $carousel->product_id == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" required>
                <option value="1" {{ $carousel->status ? 'selected' : '' }}>Active</option>
                <option value="0" {{ !$carousel->status ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Carousel</button>
    </form>
</div>
@endsection
