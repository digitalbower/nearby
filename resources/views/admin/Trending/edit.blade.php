@extends('admin.layouts.masteradmin')
@section('title', 'Edit Trending Product')
@section('content')

<div class="container mt-5">
    <h2>Edit Trending Product</h2>
    <form action="{{ route('admin.trending.update', $trendingProduct->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Trending Product</label>
            <select class="form-control" name="product_id" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $product->id == $trendingProduct->product_id ? 'selected' : '' }}>
                        {{ $product->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
