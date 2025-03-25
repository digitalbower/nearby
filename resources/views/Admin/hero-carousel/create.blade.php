@extends('admin.layouts.masteradmin')
@section('title', 'Add Hero Carousel')

@section('content')
<div class="container">
    <h4>Add Hero Carousel</h4>
    <form action="{{ route('admin.hero-carousel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="product_id" class="form-label">Select Product</label>
            <select class="form-control" name="product_id" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" name="status" required>
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add to Carousel</button>
    </form>
</div>
@endsection
