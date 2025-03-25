@extends('admin.layouts.masteradmin')
@section('title', 'Edit Popular Product')
@section('content')

<div class="container mt-5">
    <h2>Edit Popular Products</h2>
    <form action="{{ route('admin.popular.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Select Products</label>
            <select class="form-control" name="product_ids[]" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ in_array($product->id, $selectedProducts) ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
