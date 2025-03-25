@extends('admin.layouts.masteradmin')

@section('title', 'Select Trending Products')
@section('content')

<div class="container mt-5">
    <h2>Select Trending Products</h2>
    <form action="{{ route('admin.trending.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Trending Products</label>
            <select class="form-control" name="product_ids[]" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
            <small>Hold CTRL (Windows) or CMD (Mac) to select multiple.</small>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>

@endsection
