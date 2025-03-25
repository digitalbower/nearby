@extends('admin.layouts.masteradmin')

@section('title', 'Select Popular Products')
@section('content')

<div class="container mt-5">
    <h2>Select Popular Products</h2>
    <form action="{{ route('admin.popular.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Select Products</label>
            <select class="form-control" name="product_ids[]" multiple required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>

@endsection
